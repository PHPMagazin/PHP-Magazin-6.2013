<?phppublic function init() {  $req = $this;  $job = $this->job = new \PHPDaemon\Core\ComplexJob(function () use ($req) {     // called when job is done    $req->wakeup(); // wake up the request immediately  });  $job('select', function ($name, $job) use ($req) {     // registering job named 'showvar'    $req->appInstance->sql->getConnection(function ($sql) use ($name, $job) {      if (!$sql->isConnected()) {        $job->setResult($name, null);        return null;      }      $sql->query('SELECT 123, "string"', function ($sql, $success) use ($job, $name) {        $job('showdbs', function ($name, $job) use ($sql) {          // registering job named 'showdbs'          $sql->query('SHOW DATABASES', function ($sql, $t) use ($job, $name) {            $job->setResult($name, $sql->resultRows);          });        });        $job->setResult($name, $sql->resultRows);      });      return null;    });  });  $job(); // let the fun begin  $this->sleep(5, true); // setting timeout}
class AThread extends Thread {  protected $counter = 0;  public function run() {    for ($i = 0; $i < 100; $i++) {      $this->counter++;    }    echo "Counter is: " . $this->counter . PHP_EOL;  }}$someThread = new AThread();$someThread->start();echo "Finished script" . PHP_EOL;
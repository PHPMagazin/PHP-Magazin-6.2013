$start = time();$downloads = array(  'file-0-output.csv' => 'file-0-big.csv');foreach ($downloads as $name => $url) {  $in = fopen($url, "r");  stream_set_blocking($in, 0);  $out = fopen($name, "w");  stream_set_blocking($out, 0);  new EvIo($in, Ev::READ, function($ei) use ($name, $in, $out) {    while (($row = fgetcsv($in)) !== false) {      new EvIo($out, Ev::WRITE, function($eo) use($name, $out, $row) {        fputcsv($out, $row);        $eo->stop();      });      Ev::run();    }    $ei->stop();  });}Ev::run();
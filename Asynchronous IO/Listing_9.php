$rows = array();$chunks = array();$counter = 0;$chunkCounter = 0;while (($data = fgetcsv($fp, 0, ",")) !== false) {  $rows[] = new Row($data[0], $data[1], $data[2]);  if ($counter++ == 200) {    $chunks[$chunkCounter] = new Chunk($rows);    $chunks[$chunkCounter]->start();    $rows = array();    $counter = 0;    $chunkCounter++;  }}
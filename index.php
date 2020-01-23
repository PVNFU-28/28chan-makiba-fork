<HTML>
  <head>
    <title>board name</title>
    <link rel="stylesheet" type="text/css" href="static/yotsuba.css">
  </head>
  <body>
    <div id="boardsection"></div>
    <a href="javascript:location.reload();"><img src="static/logo.png" id="logo"></a><br>
    <div id="boardname">/b/ - ullshit</div><br>
    <div id="threadcreate">
      <form enctype="multipart/form-data"  action="post.php" method="post">
       <form name="postform" id="postform" action="postcomment.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
			<input type="hidden" name="parent" value="0">
			<table class="postform">
				<tbody>
					<tr>
						<td class="postblock">
							Name
						</td>
						<td>
							<input type="text" name="name" size="28" maxlength="75" accesskey="n">
						</td>
					</tr>
					<tr>
						<td class="postblock">
							E-mail
						</td>
						<td>
							<input type="text" name="email" size="28" maxlength="75" accesskey="e">
						</td>
					</tr>
					<tr>
						<td class="postblock">
							Subject
						</td>
						<td>
							<input type="text" name="subject" size="40" maxlength="75" accesskey="s" autocomplete="off">
							<input type="submit" value="Submit" accesskey="z">
						</td>
					</tr>
					<tr>
						<td class="postblock">
							Message
						</td>
						<td>
							<textarea id="message" name="message" cols="48" rows="4" accesskey="m"></textarea>
						</td>
					</tr>
					
										<tr>
						<td class="postblock">
							File
						</td>
						<td>
							<input type="file" name="file" size="35" accesskey="f">
						</td>
					</tr>
					<tr>
						<td colspan="2" class="rules">
							<ul>
								
								<li>Supported file types are JPG, PNG and GIF.</li>
								<li>Maximum file size allowed is 2 MB.</li>
								<li>Images greater than 250x250 will be thumbnailed.</li>
								
							</ul>
						</td>
					</tr>
				</tbody>
			</table>
      </form>
      </form>
    </div>
    <hr>
    <?php
      $path = "thread/";
      if(is_dir($path))
      {
      	$threads = scandir($path,1);
      	natsort($threads);
        $threads = array_reverse($threads, false);
        for($i = 0; $i <= 10; $i++)
        {
          if(is_file($path . $threads[$i]))
          {
            $f = fopen($path . $threads[$i], 'r');
					  $metainformation = fgets($f);
            $body = fgets($f);
            $metainformation = str_replace("[", "", $metainformation);
            $metainformation = str_replace("]", "", $metainformation);
            $meta = explode(", ", $metainformation);
            $name = trim(preg_replace('/\s\s+/', ' ', str_replace('"', '', str_replace('name="', '', $meta[0]))));
            $date = trim(preg_replace('/\s\s+/', ' ', str_replace('"', '', str_replace('date="','', $meta[1]))));
            $title = trim(preg_replace('/\s\s+/', ' ', str_replace('"','', str_replace('title="','', $meta[2]))));
            $include = trim(preg_replace('/\s\s+/', ' ', str_replace('"', '', str_replace('include="','', $meta[3]))));
            echo '<div id="main_postcontainer">';
            if(!empty($include))
            {
              echo '<span id="metadata">File: <a href="cdn/' . $include .'">' . $include .'</a></span><br>';
              echo '<a href="cdn/' . $include . '"><img id="thumb" style="vertical-align: top;" src="cdn/' . $include . '"></a>';
            }
            echo '<span id="posttitle">' . $title .'    </span><span id="name">' . $name .'    </span><span id="date">' . $date .'   </span><span id="postno">No. ' . str_replace(".txt","",$threads[$i]) . '</span><br><br>';
            echo '<span id="body">' . str_replace("#","",$body) . '</span><br>';
            echo '<a id="body" href="thread.php?=' . str_replace(".txt","",$threads[$i]) .'">Show more</a><br><br><br><br><br><br><br><br><br>';
            echo '</div><hr>';
          }
        }
      }
      else{}
    ?>
  </body>
</HTML>

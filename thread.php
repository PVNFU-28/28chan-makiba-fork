<?php
	$id = str_replace("=","",$_SERVER['QUERY_STRING']);
?>
<HTML>
  <head>
    <link rel="stylesheet" type="text/css" href="static/yotsuba.css">
  </head>
  <body>
    <div id="boardsection"></div>
    <a href="index.php"><img src="static/logo.png" id="logo"></a><br>
    <div id="threadcreate">
      <form enctype="multipart/form-data"  action="postcomment.php" method="post">
       <div id="boardname">/b/ - ullshit</div><br>
    <div id="threadcreate">
      <form enctype="multipart/form-data"  action="post.php" method="post">
       <form name="postform" id="postform" action="post.php" method="post" enctype="multipart/form-data">
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
      </form>
    </div>
    <hr>
    <?php
      $threadlink = "thread/" . $id . ".txt";
      $thread = fopen($threadlink, "r");
			$cnt = 0;
			$pastinclude = 0;
			$firsttitle = 0;
      while(!feof($thread)){
				$cnt = $cnt + 1;
				$line = fgets($thread);
        if(substr($line, 0, 1) === "[")
        {
					if($cnt === 1) {	}
					else
					{
						if($pastinclude == 1)
						{
							echo '<br><br><br><br><br><br><br><br><br></div>';
						}
						else
						{
								echo '<br></div>';
						}
					}
					$metainformation = str_replace("[", "", $line);
					$metainformation = str_replace("]", "", $metainformation);
					$meta = explode(", ", $metainformation);
					$name = trim(preg_replace('/\s\s+/', ' ', str_replace('"', '', str_replace('name="', '', $meta[0]))));
					$date = trim(preg_replace('/\s\s+/', ' ', str_replace('"', '', str_replace('date="','', $meta[1]))));
					$title = trim(preg_replace('/\s\s+/', ' ', str_replace('"','', str_replace('title="','', $meta[2]))));
					$include = trim(preg_replace('/\s\s+/', ' ', str_replace('"', '', str_replace('include="','', $meta[3]))));
					echo '<div id="postcontainer">';
					if(!empty($include))
					{
						echo '<span id="metadata">File: <a href="cdn/' . $include .'">' . $include .'</a></span><br>';
						echo '<a href="cdn/' . $include . '"><img id="thumb" style="vertical-align: top;" src="cdn/' . $include . '"></a>';
						$pastinclude = 1;
					}
					else
					{
						$pastinclude = 0;
					}
					echo '<span id="posttitle">' . $title .'    </span><span id="name">' . $name .'    </span><span id="date">' . $date .'   </span>     <br><br>';
        }
				else if(substr($line, 0, 1) === "#")
				{
					if(substr(str_replace("#","",$line), 0 , 1) === ">")
					{
						echo '<span id="body"><span id="greentext">' . str_replace("#","",$line) . '</span></span><br>';
						if($firsttitle === 0)
						{
							echo '<title>64chan - ' . str_replace("#","",$line) . '</title>';
							$firsttitle = 1;
						}
					}
					else
					{
						$arr = explode(">", $line, 2);
						if(count($arr) > 1)
						{
							$arr[0] = str_replace("#","",$line);
							$arr[1] = '<span id="greentext">>' . $arr[1] . '</span>';
							$res = implode(" ", $arr);
							echo '<span id=body>' . $res . '</span><br>';
							if($firsttitle === 0)
							{
								echo '<title>/krila/ - ' . $res . '</title>';
								$firsttitle = 1;
							}
						}
						else
						{
							echo '<span id="body">' . str_replace("#","",$line) . '</span><br>';
							if($firsttitle === 0)
							{
								echo '<title>/b/ - ' . str_replace("#","",$line) . '</title>';
								$firsttitle = 1;
							}
						}
					}
				}
				else
				{
					if(substr($line, 0 , 1) === ">")
					{
						echo '<span id="body"><span id="greentext">' . $line . '</span></span><br>';
					}
					else
					{
						$arr = explode(">", $line, 2);
						if(count($arr) > 1)
						{
							$arr[1] = '<span id="greentext">>' . $arr[1] . '</span>';
							$res = implode(" ", $arr);
							echo '<span id=body>' . $res . '</span>';
						}
						else
						{
							echo '<span id="body">' . $line . '</span><br>';
						}
					}
				}
      }
    ?>
  </body>
</HTML>

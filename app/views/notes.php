<?php

$colors  = ["lazur-bg","red-bg","yellow-bg"];
$rotates = ["rotate-1","rotate-2"];
$id    = SYSTEM\Session::get('id');
$notes = (new Controllers\NoteController)->fetch($id);
$notes = array_reverse($notes);
?>
<div class="container bootstrap snippets bootdey">
    <div class="row center">
		<ul class="notes" id="notes">
        <?php 
    foreach($notes as $note){
        $color = $colors[array_rand($colors)];
        $rotate= $rotates[array_rand($rotates,1)];
?>
      
<li>
    <div class="<?php echo  $rotate.' '.$color ;?>">
        <small><?= $note->date ?></small>
        <h5><?= $note->title;?></h5>
        <p><?=$note->description;?></p>
        <form  action="/?p=home&path=note" method="POST" id="idNote" >
            <input type="hidden" value="<?=$note->id;?>" name="Noteid"/>
            <a href="javascript:{}" name="delNote" class="text-danger pull-right" onclick="document.getElementById('idNote').submit();"><i class="fa fa-trash-o " style="position : absolute;
            bottom   : 0">
            </i></a>
        </form>
    </div>
</li>   
<?php } ?> 
		</ul>  
	</div>
</div>

                   















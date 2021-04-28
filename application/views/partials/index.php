<?php for($i = 1; $i < count($directions); $i++) { ?>
    <h3>Directions from <?= '<span class="from_location">'.$this->input->post('from_location').'</span>' ?> to <?= '<span class="to_location">'.$this->input->post('to_location').'</span>' ?> </h3>
<?php   foreach($directions as $direction) { ?>
            <p><?= $i++.'. '.$direction -> html_instructions ?> </p> 
<?php   } ?>   
<?php } ?>
</div>
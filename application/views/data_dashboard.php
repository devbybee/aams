<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <div class="row">
        <?php
        $limit = 20;
        $num_data = count($monit);
        // print_r($monit); exit();
        $page =  ceil(($num_data/$limit));
        $class_col = 12/$page;
        $start_index = 0;
        
        for ($i = 1; $i<=$page; $i++) {
            // pagination
            $end_index = ($i * $limit) - 1;
            // echo $end_index; exit();

        ?>
        <div class="col-md-<?=$class_col;?>">
        <table class="table table-sm table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">App Name</th>
                    <th class="text-center">status</th>
                </tr>
            </thead>
            <tbody>
	    <?php
            foreach($monit as $index => $row) {
                if ($index >= $start_index && $index <= $end_index) {
                $status = ($row['status'] == 1) ? '<button class="btn btn-sm btn-success">OK</button>' : '<button class="btn btn-sm btn-danger">X</button>';
		?>
                <tr>
                    <td><a href="<?=$row['link'];?>" target="_blank"><?=$row['name'];?></a></td>
                    <td class="text-center"><?=$status;?></td>
                </tr>
            <?php
                } //end if
            }
            ?>
            </tbody>
        </table>
        </div><!--end col-->
        <?php
        $start_index = $i * $limit;
        // echo $start_index;
        // end of for
        }
        ?>
        </div><!--end row-->

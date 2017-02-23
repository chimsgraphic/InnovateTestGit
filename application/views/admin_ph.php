
		
		
		
		
		 <div class="row">
        <div class="col-md-8 col-md-offset-2 bg-border">
        <h2 class="page-header">Provide Helps</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th><strong>PHID</strong></th>
                    <th><strong>User</strong</th>
                    <th><strong>Amount</strong></th>
                    </tr>
                </thead>
                <tbody>
                <?php for ($i = 0; $i < count($phelps); $i++) { ?>
                <tr>
                    <td><?php echo $phelps[$i]->phid; ?></td>
                    <td><?php echo $phelps[$i]->uname; ?></td>
                    <td><?php echo $phelps[$i]->amount; ?></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            
        </div>
    </div>
    
    
    
     
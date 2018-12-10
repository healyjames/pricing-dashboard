<div class="body-container">

<!-- SEARCH FACILITY -->
<div class="search-container container">

<input type="text" id="searchBar" onkeyup="searchTable()" placeholder="Search for country..."><a href="/create"><button class="focus-btn btn home-btn">Add New Price</button></a>
<script src="<?php echo base_url(); ?>assets/custom-scripts/search-table.js"></script>
    
</div>


		      <table id="visaPrices">
			     <thead>
				    <tr class="table-header">
                        <th></th>
                        <th>Country</th>
                        <th>Purpose</th>
                        <th>Visa Type</th>
                        <th>Processing Time (TVC)</th>
                        <th>Processing Time (Embassy)</th>
                        <th>Validity</th>
                        <th>Stay</th>
                        <th>Entries</th>
                        <th>Embassy Fee</th>
                        <th>Price Band</th>
                        <th>Service Fee</th>
                        <th>VAT</th>
                        <th>Additional Fee</th>
                        <th>Total</th>
                        <th></th>
				    </tr>
                </thead>
                <tbody>
                    <tr>

<?php

//Escaping html -> http://php.net/manual/en/language.basic-syntax.phpmode.php

foreach($visas as $visa){
    
    $additionalfee = $visa['additional_fee'];
    
    if($visa['additional_fee_vat'] != '1'){
        
        $additionalfee = $additionalfee;
        
    }else {
        
        $additionalfee = $additionalfee * $vat_rate;
        
    }
    
    echo '<td class="edit"><a href="/update/' . $visa['visa_id'] . '"><img src="' . base_url() . 'assets/images/edit.png"></a></td>';
    echo "<td>" . html_escape($visa['country']) . "</td>";
    echo "<td>" . html_escape($visa['purpose']) . "</td>";
    echo "<td>" . html_escape($visa['visatype']) . "</td>";
    echo "<td>" . html_escape($visa['processingtime_tvc']) . "</td>";
    echo "<td>" . html_escape($visa['processingtime_embassy']) . "</td>";
    echo "<td>" . html_escape($visa['validity']) . "</td>";
    echo "<td>" . html_escape($visa['stay']) . "</td>";
    echo "<td>" . html_escape($visa['entries']) . "</td>";
    echo "<td>£" . html_escape($visa['embassy_fee']) . "</td>";
    echo "<td>" . html_escape($visa['price_band_id']) . "</td>";
    echo "<td>£" . html_escape($visa['variable_service_fee'] + $visa['price']) . "</td>";
    echo "<td>£" . html_escape($visa['variable_service_fee'] + $visa['price']) * 0.2 . "</td>";
    echo "<td>£" . html_escape($additionalfee) . "</td>";
    echo "<td>£" . html_escape($visa['embassy_fee'] + $visa['variable_service_fee'] + $visa['price'] + $additionalfee) . "</td>";
    echo '<td class="delete"><a href="/delete/' . $visa['visa_id'] . '"><img src="' . base_url() . 'assets/images/delete.png"></a></td>';
    
    
    
    echo "</tr>";
    
}


?>
                        
                    </tr>
                </tbody>
            </table>
    
    
    
    <div class="total-footer">
    
        <p>Total items: <span id="total-items"></span></p>
        
    </div>
    
    
    
    </div>

<script src="<?php echo base_url(); ?>assets/custom-scripts/total-items.js"></script>
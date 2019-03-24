<style>
@font-face {
  font-family: SourceSansPro;
  src: url(SourceSansPro-Regular.ttf);
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}


#details {
  margin-bottom: 50px;
}

#client {
  padding-left: 6px;
  float: left;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: right;
  text-align: right;
}

#invoice h1 {
  font-size: 2.4em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

table {
  width: 100%;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 20px;
  text-align: center;
}

table th {
  white-space: nowrap;        
  font-weight: normal;
}

table td {
  text-align: right;
}

table td h3{
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  font-size: 1.6em;
}

table .desc {
  text-align: left;
}


table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table tfoot td {
  padding: 10px 20px;
  font-size: 1.2em;
  white-space: nowrap; 
}

table tfoot tr:last-child td {
  font-size: 1.4em;
}


#thanks{
  margin-bottom: 50px;
}

#background{
    position:absolute;
    z-index:0;
    #background:white;
    display:block;
    min-height:50%; 
    min-width:50%;
	margin-top: 15%;
	    opacity: 0.5;
}

#content{
    position:absolute;
    z-index:1;
}

#bg-text
{
    color:lightgrey;
    font-size:80px;
    transform:rotate(300deg);
    -webkit-transform:rotate(300deg);
}

</style>
	   <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="header-icon">
                         <i class="fa fa-cart-plus"></i>
                    </div>
                    <div class="header-title">
                        <h1><a href="admin/order/" ><?php echo $heding; ?> </a>&nbsp; 
						<?php if($this->session->user_type == 0){ ?>
					 <a href="admin/order/add" ><i class="fa fa-plus"></i></a>
						<?php }
                         if($this->session->user_type == 1){
							 if($privilege_data[$this->pro->userprivilege.'_add'] == '1'){
						?>
					 <a href="admin/order/add" ><i class="fa fa-plus"></i></a>
							 <?php } } ?>
							 
							 <span style="margin-left
							 :11%; color:green;" ><?php echo $this->session->flashdata('mailsuccess'); ?></span>
							 
						</h1>
						
						
                        <ol class="breadcrumb">
						 
                            <li><a href="admin/dashboard"><i class="pe-7s-home"></i>Home</a></li>
                            <li class="active"><?php echo $heding; ?></li>
							
							
							  
                        </ol>
                    </div>
                </section>
                <!-- Main content -->
                <section class="content">
                    
                    
					
					
					
					
					<div class="row "  >

						 
						<div class="col-sm-12 print_invoice mailtemplate" style="padding:20px;" >
                            
							<main style="width: 95%;"  >
							
							
							<div id="background">
								<p id="bg-text" style="opacity: 0.5;" >11needs.com</p>
							</div>
							
						  <div id="details" class="clearfix">
						  
						  
							<div id="client" style="margin-right:20%;" >
							 
							  <h2 class="name">11needs</h2>
							  <div class="address">
							  Company Bagh Police Chowki
							  <br />
							  Patna : 801503
							  </div>
							  <div class="email" style="font-weight:900;" > Registration Number : P.T./TBSE_REG/2018/01170</div>
							</div>
						  
						  
							
							
							<div id="invoice">
							  <h3>FSS Certificate No. <br /> 20418004000007 </h3>
							  						  
							</div>
							
							
						  </div>
						  
						  
						  
						  <table border="1" cellspacing="0" cellpadding="0">
							<thead>
							  <tr>
							  
							    <tr>
								<th  colspan="2" class="desc" >
								
								<div id=""   >
								  <div class="to">INVOICE TO:</div>
								  <h2 class="name"><?php echo $booking[$this->pro->user.'_name']; ?> <?php echo $booking[$this->pro->booking.'_lastname']; ?></h2>
								  <div class="address"><?php echo $booking[$this->pro->user.'_address']; ?></div>
								  <h4>Phone <?php echo $booking[$this->pro->user.'_phone']; ?></h4>
								  <div class="email"><?php echo $booking[$this->pro->user.'_email']; ?></div>
								</div>
								
								</th>
								
								<th colspan="2" class="unit" >
								<p style="font-size:16px;font-weight:600;" >Invoice No</p>
								
								<h3>1100<?php echo $booking[$this->pro->booking.'_id']; ?></h3>
								<div class="date">Date of Invoice : <?php echo $booking[$this->pro->booking.'_date']; ?></div>
								</th>
								<th colspan="2" class="desc" >
								<p style="font-size:16px;font-weight:600;" >Order No </p>
								<h3><?php echo $booking[$this->pro->booking.'_invoiceId']; ?></h3>
								<div class="date">Date of Invoice : <?php echo $booking[$this->pro->booking.'_date']; ?></div>
								<div class="date">Delivery Time : <?php echo $booking[$this->pro->booking.'_time']; ?></div>
								</th>
								
								</tr>
							  
								<th class="no">S.N.</th>
								<th class="desc">Name</th>
								<th class="unit" >Unit</th>
								<th class="desc">UNIT PRICE</th>
								<th class="qty">QUANTITY</th>
								<th class="total">TOTAL</th>
							  </tr>
							</thead>
							<tbody>
							<?php 
							$total = 0;
							$products = $this->om->bookingdetail($booking[$this->pro->booking.'_invoiceId']);
							$i=1;
							foreach($products as $product){
							?>
							  <tr>
								<td class="no"><?php echo $i; $i++; ?></td>
								
								
								
								<td class="desc"><?php echo $product[$this->pro->bookingdetail.'_title']; ?></td>
								
								<td class="unit" style="text-align:left;"  ><?php echo $product[$this->pro->productunit.'_value']; ?> &nbsp; <?php echo $product[$this->pro->productunit.'_name']; ?></td>
								
								<td class="desc"><?php echo $product[$this->pro->bookingdetail.'_price']; ?></td>
								
								<td class="qty"><?php echo $product[$this->pro->bookingdetail.'_quantity']; ?></td>
								<td class="total"><?php echo $product[$this->pro->bookingdetail.'_subtotal']; ?></td>
							  </tr>
							<?php 
							
							$total += $product[$this->pro->bookingdetail.'_subtotal']; 
							
							}  ?>
							 
							</tbody>
							<tfoot>
							  <!----<tr>
								<td colspan="2"></td>
								<td colspan="2">SUBTOTAL</td>
								<td><?php echo $total; ?></td>
							  </tr>--->
							 
							  <tr>
								<td colspan="3"></td>
								<td colspan="2">GRAND TOTAL</td>
								<td><?php echo $total; ?></td>
							  </tr>
							</tfoot>
						  </table>
						  <div id="thanks">
						  
							<h3>Thank You</h3>
						  
						  </div>
						  <div id="">
							<div class="notice"> All subject to patna jurisdiction only this is system generated invoice. </div>
						  </div> 
						</main>
							
						
                        </div>
							<div class="row" >
								<div class="col-md-6" >
								<button type="button" class="btn btn-default hrefPrint" ><i class="fa fa-print" aria-hidden="true" style="    font-size: 17px;"> Print</i></button>	
								</div>
								<div class="col-md-6" >
								<form method="post" >
									<textarea class="maildata" name="maildata" style="display:none;" >
									
									</textarea>
									<button type="submit" class="btn btn-default" value="send" name="send" ><i class="fa fa-envelope" aria-hidden="true" style="    font-size: 17px;"> Send Invoice</i></button>	
								</form>
								</div>
							</div>
                    </div>
										
					
                </section> <!-- /.content -->
            </div> <!-- /.content-wrapper -->
			<script>
				window.onload = function maildata(){
					var data = $('.mailtemplate').html();
					//alert(data);
					console.log(data);
					$('.maildata').html(data);
				}
			
			</script>
			
			
			
<script>
// Create a jquery plugin that prints the given element.
jQuery.fn.print = function(){
// NOTE: We are trimming the jQuery collection down to the
// first element in the collection.
if (this.size() > 1){
this.eq( 0 ).print();
return;
} else if (!this.size()){
return;
}
 
// ASSERT: At this point, we know that the current jQuery
// collection (as defined by THIS), contains only one
// printable element.
 
// Create a random name for the print frame.
var strFrameName = ("printer-" + (new Date()).getTime());
 
// Create an iFrame with the new name.
var jFrame = $( "<iframe name='" + strFrameName + "'>" );
 
// Hide the frame (sort of) and attach to the body.
jFrame
.css( "width", "1px" )
.css( "height", "1px" )
.css( "position", "absolute" )
.css( "left", "-9999px" )
.appendTo( $( "body:first" ) )
;
 
// Get a FRAMES reference to the new frame.
var objFrame = window.frames[ strFrameName ];
 
// Get a reference to the DOM in the new frame.
var objDoc = objFrame.document;
 
// Grab all the style tags and copy to the new
// document so that we capture look and feel of
// the current document.
 
// Create a temp document DIV to hold the style tags.
// This is the only way I could find to get the style
// tags into IE.
var jStyleDiv = $( "<div>" ).append(
$( "style" ).clone()
);
 
// Write the HTML for the document. In this, we will
// write out the HTML of the current element.
objDoc.open();
objDoc.write( "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">" );
objDoc.write( "<html>" );
objDoc.write( "<body>" );
objDoc.write( "<head>" );
objDoc.write( "<title>" );
objDoc.write( document.title );
objDoc.write( "</title>" );
objDoc.write( jStyleDiv.html() );
objDoc.write( "</head>" );
objDoc.write( this.html() );
objDoc.write( "</body>" );
objDoc.write( "</html>" );
objDoc.close();
 
// Print the document.
objFrame.focus();
objFrame.print();
 
// Have the frame remove itself in about a minute so that
// we don't build up too many of these frames.
setTimeout(
function(){
jFrame.remove();
},
(60 * 1000)
);
}

</script>			
<script type="text/javascript">
$(function() {
$(".hrefPrint").click(function() {
	//alert();
// Print the DIV.
$(".print_invoice").print();
return (false);
});
});
</script>
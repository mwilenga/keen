<?php
session_start();
 include('dBConfig/dBConnect.php');
 include('includes/header.php');
?>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="left_content">
           <div class="single_post_content">
            <center><h3>OUR CLIENTS</h3></center><br>
            <div class = "row">
            <div class="col-lg-12 col-md-12 col-sm-12">

            <table class="table table-bordered">
              <thead>
                <th>S/N</th>
                <th>CLIENT  NAME</th>
                <th>TYPE OF SERVICE </th>
                <th>CLIENT STATUS</th>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>
                    <p>LIYOD  INSURANCE LTD</p>
                  </td>
                  <td>
                    <p>COMPUTER SUPLIMENT  </p>
                  </td>
                  <td>
                    <p>GOODS CLEARED & DELIVERED</p>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>
                    <p>TANZANIA CIVIL AVIATION AUTHORITY (TCAA)</p>
                  </td>
                  <td>
                    <p>DESIGNING & PRINTING F ANNUAL REPORT </p>
                  </td>
                  <td>
                    <p>GOODS CLEARED &DELIVERED </p>
                  </td>
                </tr>

                <tr>
                  <td>3</td>
                  <td>
                    <p>UNIVERSITY OF DAR ES SALAAM, (GEOLOGY DEPARTMENT)</p>
                  </td>
                  <td>
                    <p>COMPUTER SERVICE & LOCAL AREA NETWORK (LAN)</p>
                  </td>
                  <td>
                    <p>SERVICE DELIVERED </p>
                  </td>
                </tr>
                 <tr>
                  <td>4</td>
                  <td>
                    <p>SUMA JKT</p>
                  </td>
                  <td>
                    <p>COMPUTER  SERVICES</p>
                  </td>
                  <td>
                    <p>SERVICE DELIVERED </p>
                  </td>
                </tr>
              </tbody>
            </table>
         
          <div class="single_post_content">
          </div>
        </div>
      </div>
    </div>
  </section>
  
 <?php include('includes/footer.php'); ?>
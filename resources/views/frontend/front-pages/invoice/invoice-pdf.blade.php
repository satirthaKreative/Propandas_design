<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
   <meta http-equiv="content-type" content="text/html;charset=UTF-8">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
      <title>Propandas</title>
      <style type="text/css">
         * {
         box-sizing: border-box;
         -webkit-box-sizing: border-box;
         }
         body {
         margin: 0 auto;
         padding: 0;
         font-family: "Poppins";
         }
         body,
         table,
         td,
         p,
         a,
         li,
         blockquote {
         -webkit-text-size-adjust: 100%;
         -ms-text-size-adjust: 100%;
         }
         table,
         td {
         border-collapse: collapse;
         mso-table-lspace: 0pt;
         mso-table-rspace: 0pt;
         }
         img {
         -ms-interpolation-mode: bicubic;
         }
         @media screen and (max-width: 650px) {
         table {
         width: 100% !important;
         }
         }
         @media screen and (max-width: 380px) {
         #address-1 p;#address-2 p  {
         font-size: 10px !important;
         }
         #address-1 p span {
         display: inline-block;
         width: 100% !important;
         }
         table#prjct-id tr th {
         white-space: normal !important;
         font-size: 11px;
         padding: 10px 8px !important;
         }
         table#prjct-id tbody{
         font-size: 11px !important;
         text-align: center;
         line-height: 16px !important;
         }
         table#prjct-id tbody tr td{
         padding: 8px;
         }
         #ft-email{
         margin-top: 10px !important;
         }
         }
      </style>
   </head>
   <body >
      <table style="width:600px;background-color: #f7f6f6;margin: 0 auto;border: solid 1px #f3f3f3;"  >
         <tr style=" padding: 15px;  display: inline-block; width: 100%;">
            <td style="width:100%; float:left;">
               <div style="width: 50%; display: inline-block; float:left;">
                  <p style="text-align: left;">
                     <a href="#"><img src="http://propandas.com/frontAssets/images/logo.png" alt="#" style="max-width: 80px;"></a> 
                  </p>
               </div>
               <div style="width: 50%;  float:left;">
                  <p style="text-align: right; text-transform: uppercase; font-size: 30px; color: #022058; font-weight:600;line-height: 27px;letter-spacing: 0;">Invoice</p>
               </div>
            </td>
            <td style="width:100%;display: inline-block;margin-top: 20px;">
               <div style="width: 50%; float:left; padding-right: 25px;" id="address-1">
                  <p style="font-size: 11px;display: inline-block;width: 100%;line-height: normal;margin: 1px 0px;">
                     <span style="margin-right: 10px; width: 65px;display: inline-block;float: left;">Client</span>
                     <span style="width: calc(100% - 75px); float: left;">{{ $client_name }}</span>
                  </p>
                  <p style="font-size: 11px;display: inline-block;width: 100%;line-height: normal;margin: 1px 0px;">
                     <span style="margin-right: 10px; width: 65px;display: inline-block;float: left;">Address</span>
                     <span style="width: calc(100% - 75px); float: left;">{{ $client_address }}</span>
                  </p>
                  <p style="font-size: 11px;display: inline-block; width: 100%; line-height: normal;margin: 1px 0px;">
                     <span style="margin-right: 10px; width: 65px;display: inline-block;float: left;">Email</span>
                     <span style="width: calc(100% - 75px); float: left;">{{ $client_email }}</span>
                  </p>
                  <p style="font-size: 11px;display: inline-block; width: 100%; line-height: normal;margin: 1px 0px;">
                     <span style="margin-right: 10px; width: 65px;display: inline-block;float: left;">Phone</span>
                     <span style="width: calc(100% - 75px); float: left;">{{ $client_phone }}</span>
                  </p>
               </div>
               <div style="width: 50%;  float:right; padding-left: 25px; text-align: right;" id="address-2">
                  <p style="font-size: 11px;display: inline-block;width: 100%;line-height: normal;margin: 1px 0px;">
                     {{ $lawyer_name }}
                  </p>
                  <p style="font-size: 11px;display: inline-block;width: 100%;line-height: normal;margin: 1px 0px;">
                     {{ $lawyer_address }}
                  </p>
                  <p style="font-size: 11px;display: inline-block;width: 100%;line-height: normal;margin: 1px 0px;">
                     {{ $lawyer_email }}
                  </p>
                  <p style="font-size: 11px;display: inline-block;width: 100%;line-height: normal;margin: 1px 0px;">
                     {{ $lawyer_phone }}
                  </p>
               </div>
            </td>
         </tr>
         <tr>
            <td>
               <table style="width: 100%" id="prjct-id">
                  <thead style="border-bottom: 1px solid #C1CED9;font-size: 13px;text-transform: uppercase;background: #022058; text-align: left;">
                     <tr>
                        <th style="padding: 15px 8px;color: #fdfdfd;font-weight: normal;white-space: nowrap;">Project Id</th>
                        <th style="padding: 15px 8px;color: #fdfdfd;font-weight: normal;white-space: nowrap;">Project Name</th>
                        <th style="padding: 15px 8px;color: #fdfdfd;font-weight: normal;white-space: nowrap;">Timing </th>
                        <th style="padding: 15px 8px;color: #fdfdfd;font-weight: normal;white-space: nowrap; text-align: center;">Budget</th>
                     </tr>
                  </thead>
                  <tbody style="font-size: 12px;">
                     <tr style="background-color: #f5f5f5;" >
                        <td style="padding: 15px 8px; color: #5D6975;  font-weight: normal;" >#{{ $projectId }}</td>
                        <td style="padding: 15px 8px; color: #5D6975;  font-weight: normal;">{{ $projectName }}</td>
                        <td style="padding: 15px 8px; color: #5D6975;  font-weight: normal;">02/02/2020 - 24/03/2020</td>
                        <td style="padding: 15px 8px; color: #5D6975;  font-weight: normal;">$100</td>
                     </tr>
                     <tr style="background-color: #f3f3f3;">
                        <td colspan="3" style="padding: 15px 8px; color: #022058;  font-weight: 600; text-align: right;">SUBTOTAL</td>
                        <td class="total" style="padding: 15px 8px; color: #5D6975;  font-weight: normal;">$100</td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
         <tr>
            <td style="width: 100%; display: inline-block; padding: 15px 10px; ">
               <p style="text-transform: uppercase; font-size: 20px; color: #022058; font-weight: 600;  line-height: 27px; letter-spacing: 0;">Thank you!</p>
               <p style="text-align: left;border-left: solid 5px #022058;padding-left: 8px;font-size: 12px;line-height: 19px;color: #000000;font-weight: 100;letter-spacing: 0;">
                  Notice: <br>
                  <span>Invoice was created on a computer and is valid without the signature and seal.</span>
               </p>
            </td>
            <td  style="width: 100%; display: inline-block; padding: 15px 10px; margin-top: 100px; " id="ft-email">
               <p style=" margin: 7px 0px; text-align: center; color: #13264e; display: block;  width: 100%;font-size: 12px;  ">© 2020 <a href="#" style="text-decoration: none;">propandas.com</a>  |  All Rights Reserved. </p>
            </td>
         </tr>
         </tr>
      </table>
   </body>
</html>
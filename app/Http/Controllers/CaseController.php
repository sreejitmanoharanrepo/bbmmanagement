<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Dispute;



class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unique_case = array();
        $repeate_dispute= Dispute::all('DisputeID');
        foreach ( $repeate_dispute as $rpt_dispute )
        {
            $dispute= $rpt_dispute['DisputeID'];
            array_push($unique_case, $dispute);
        }
        $headers = array (
            //Regulates versioning of the XML interface for the API
            'X-EBAY-API-SITEID:0',
            
            //set the keys'
            'X-EBAY-API-COMPATIBILITY-LEVEL:967',
            'X-EBAY-API-CALL-NAME:GetUserDisputes'
              );
        
          $urlserver="https://api.ebay.com/ws/api.dll";
        
          $requestBody='<?xml version="1.0" encoding="utf-8"?>
          <GetUserDisputesRequest xmlns="urn:ebay:apis:eBLBaseComponents">
            <!-- This call might not work in Sandbox -->
            <RequesterCredentials>
              <eBayAuthToken>AgAAAA**AQAAAA**aAAAAA**h62HXA**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6ACkoGnDJWHoA6dj6x9nY+seQ**y94FAA**AAMAAA**T52Zi/IgcB3OU1PedVfcNr+PUggLO1svn8jglCajF/rUaP6La66MAn6lyuVPLa3DpSw8dRpERVNdhiFb8/S85rW6iwHDz9xu/f1AS5sHNN28tK8ysVJ0hOoYImX4OYDFwdb5q8mfYOrzTWF3Q4oto/Jw9Lo43DBJjrgdUfFdIe6P98lrVoxXLKJJ09sM9JPZNhMe+rdrx3bY3CaupQ1Pz0oZ3rumuuqEtfBI+6c4gTiiJ5aJX84/hScWctn0DgHU08ygCtQ3PpxAppalNUXjufLvrjjVVs3t9qxcWvMRnlE36jzGdlGCkdhVjaLtPsK4NeVs+f9aDA8iGKl4+Dt5DFOtQ5YpTDGnyvn8171g+DpH3RtR4WNQvUZTmDw9wCE/2aFSiLNWN46y0FdGBPqln3a5SNsZUMW1wMt2YqSrhfQ2+q2BGId6UouANkMMcm4A/aKVKzF3d8hGls5TchH5ZCkVFl3eZi0ixu62A7E8kux6tmArWg+HrNXtkbdml5ihaCHg+E3iGADrk5gl5MyrxxxsTreUJShULMdpl4o7mKypy1P5ej9RDvssyIkzp/HWFsAnu9hzlLqEK7rqCm837HRFl2Pmwmyu7tUchydHBKCTUgVRJJ7tYN7vxw5S2lVRC4/47XTudDGTi4jDUfzgbtWRFUvccosK0N5l+gaGwvJiMMKY58Ri32CEIi0FQwLXiODsBtVFn5ziW4V8JzJahuDaYGwLNRktVucpb/iextPs8f3M2HX381s+HBZgiOfd</eBayAuthToken>
            </RequesterCredentials>
              <ErrorLanguage>en_US</ErrorLanguage>
              <WarningLevel>High</WarningLevel>
            <DisputeFilterType>AllInvolvedDisputes</DisputeFilterType>
            <DisputeSortType>DisputeCreatedTimeDescending</DisputeSortType>
            <Pagination>
              <EntriesPerPage>5</EntriesPerPage>
              <PageNumber>1</PageNumber>
            </Pagination>
          </GetUserDisputesRequest>';
        /*AgAAAA**AQAAAA**aAAAAA**Pnh3XA**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6ABkYehAJmBpQ6dj6x9nY+seQ**MN8FAA**AAMAAA**AF71BWJFPNhC/O5uJBLdTFUGySRahNIoSZNlMAD3nopLqfyacH7K11x+6XkKan3lSQ9NHixMbnvfgh63ZdL1+PD44ALxxD770UTldrsR8GY1P+wLfhWlybFeEn/O5WS9jTQ4u2EZJSGZEnBuTTGLjtcHFVSVd29ssi6TceDamZahNIgWiBBv+4sYHigAsC4stoHo2kP5lxLDKnrdPyvSzxdSpRZd4oR0iV+J2j8G7CJYdglS+VV4ZCMZrjlqvwrgFVnyR71+M6ZnooTSe1HjB8UR92SG57/s8V9SSjMpVPz0zvdFo5nECRxnmDTNtFuw2PO/WRrF2XHzxv7Up2luAuWlGGUf27zEAFCj3Kmqb/lrKCl1LOi//TS+l5C7xY2l7jyCMYQ4czEzdMGp1g3WMFt+Dx0h/ImsZzfeH1edrHgR7cSoagp4ZBOaZrD7DKK8Z43LIu95Ja6sFKizFf3tyJJWA41cMq5Iyq3aMix7JDX/9+WMbOkEiU6qJ71TBYWRLT9jfZEIAT+O7p5nyomnYtpE1R+jRh+HG/6mIKpyy7yQbRMpzrohoflOj7AGYhdrHgtjtjemyV6WLydNXiBvvp07JBmFFwOWjV8o1gKfBULoBe0zDEN0jqYeoAZsWtn/sCQctUPhaWR0RkNV/EJGLcGm77skM8u5OIoP0czudJJ+oyS1kmTz3JSk3yxP2YeKV0rzTM+SmGYnic7+JRljRPlVKcfmiO0DtOg86eGMmq8vwo16TmcJS8tfIBtz8Goh*/
        
          //initialise a CURL session
          $connection = curl_init();
          //set the server we are using (could be Sandbox or Production server)
          curl_setopt($connection, CURLOPT_URL, $urlserver);
          
          //stop CURL from verifying the peer's certificate
          curl_setopt($connection, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($connection, CURLOPT_SSL_VERIFYHOST, 0);
          
          //set the headers using the array of headers
          curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);
          
          //set method as POST
          curl_setopt($connection, CURLOPT_POST, 1);
          
          //set the XML body of the request
          curl_setopt($connection, CURLOPT_POSTFIELDS, $requestBody);
          
          //set it to return the transfer as a string from curl_exec
          curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
          
          //Send the Request
          $response = curl_exec($connection);
          
          //close the connection
          curl_close($connection);
        //       print_r($response);
        $xml = simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA);
        $all_case = json_decode(json_encode((array) $xml), true);
        //print_r($all_case);
        $all_cases = $all_case['DisputeArray']['Dispute'];

        foreach ($all_cases as $all_case=> $key)
        {
            $DisputeID = $key['DisputeID'];
            $DisputeState =  $key['DisputeState'];
            if(!in_array( $DisputeID,$unique_case ))
            {
            $DisputeState =  $key['DisputeState'];
           if($DisputeState != "Closed")
            {
            
              $DisputeRecordType =  $key['DisputeRecordType'];
              $DisputeState =  $key['DisputeState'];
              
              $DisputeStatus = $key['DisputeStatus'];
              $OtherPartyName = $key['OtherPartyName'];
              $TransactionID = $key['TransactionID'];
              $ItemID = $key['Item']['ItemID'];
            
              $DisputeReason = $key['DisputeReason'];
              $DisputeExplanation = $key['DisputeExplanation'];
              $DisputeCreditEligibility = $key['DisputeCreditEligibility'];
              $DisputeCreatedTime = $key['DisputeCreatedTime'];
              $DisputeModifiedTime = $key['DisputeModifiedTime'];
              $OrderLineItemID = $key['OrderLineItemID'];

              $case = new Dispute;
              $case->DisputeID =  $DisputeID;
              $case->DisputeRecordType =  $DisputeRecordType;
              $case->DisputeState =  $DisputeState;
              $case->DisputeStatus =  $DisputeStatus;
              $case->OtherPartyName =  $OtherPartyName;
              $case->TransactionID =  $TransactionID;
              $case->ItemID =  $ItemID;
          
              $case->DisputeReason =  $DisputeReason;
              $case->DisputeExplanation =  $DisputeExplanation;
              $case->DisputeCreditEligibility =  $DisputeCreditEligibility;
              $case->DisputeCreatedTime =  $DisputeCreatedTime;
              $case->DisputeModifiedTime =  $DisputeModifiedTime;
              $case->OrderLineItemID =  $OrderLineItemID;
              $case->save();
            }
            
            }
            else{
              Dispute::where('DisputeID', $DisputeID)->update(['DisputeState' => $DisputeState]);
            }
          }

         
         $list_cases = Dispute::all();
         return view('disputes.list_cases')->with('list_cases',$list_cases);

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

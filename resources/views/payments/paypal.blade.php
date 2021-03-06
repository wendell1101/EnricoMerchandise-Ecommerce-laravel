@extends('layouts.base')

@section('header')
<header class="header text-dark shop-header">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="display-4 text-capitalize">Paypal</h1>
            </div>
        </div>
    </div>
</header>
@endsection


@section('content')
<main class="main-content">
    <div class="container">
        <div id="paypal-button-container"></div>
    </div>
</main>

<!--update-payment fornm -->

<form action="{{ route('payments.update', session('order')['slug']) }}" id="updateForm" method="POST" style="display:none">
  @csrf
  @method('PUT')
  <button type="submit">Submit</button>
</form>
@endsection

@section('js')
<script src="https://www.paypal.com/sdk/js?client-id=AduND7e9HdoVOq8rfjB7p645amTlTAKnB8m3Tb_hA2fgNTL9Saq1bQSkjWAy39mdzNYnIMwZuHNbGkrY&currency=PHP">
    // Required. Replace SB_CLIENT_ID with your sandbox client ID.
</script>

<script>
    paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: {{ session('order')['total_amount'] }}
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        alert('Transaction completed by ' + details.payer.name.given_name);
        document.getElementById('updateForm').submit();
        
      });
    }
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.
</script>
@endsection
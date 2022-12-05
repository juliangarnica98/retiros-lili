@extends('layouts.admin')
<style>
    /* * {
      box-sizing: border-box;
    }
    body {
      background-color: #f1f1f1;
    } */
    #regForm {
      background-color: #ffffff;
      margin: 10vh ;
      font-family: Raleway;
      padding: 40px;
      width: 80%;
      min-width: 300px;
    }
    /* h1 {
      text-align: center;  
    } */
    input {
      padding: 10px;
      width: 100%;
      font-size: 17px;
      font-family: Raleway;
      border: 1px solid #aaaaaa;
    }
    /* Mark input boxes that gets an error on validation: */
    input.invalid {
      background-color: #ffdddd;
    }
    /* Hide all steps by default: */
    .tab {
      display: none;
    }
   
    button:hover {
      opacity: 0.8;
    }
    #prevBtn {
      background-color: #bbbbbb;
    }
    /* Make circles that indicate the steps of the form: */
    .step {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbbbbb;
      border: none;  
      border-radius: 50%;
      display: inline-block;
      opacity: 0.5;
    }
    .step.active {
      opacity: 1;
    }
    /* Mark the steps that are finished and valid: */
    .step.finish {
      background-color: #04AA6D;
    }
    /* .redondo{
      margin-top: 5%;
      display: block;
      border-radius: 15px;
      background-color: #04AA6D;
      border-color: none;
    } */
    </style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
          <h1 class="text-center">Registra un nuevo retiro</h1>
            <div class="card">
                {{-- <div class="card-header">Registra un nuevo retiro</div> --}}

                
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} --}}
                    <form id="regForm" action="">
                        {{-- <h1>Registra un nuevo retiro</h1> --}}
                        <!-- One "tab" for each step in the form: -->
                        {{-- <div class="tab">Name: --}}
                          <div class="tab">
                            <div class="row">
                              <div class="col-12">

                                <div class="form-group"> <!-- Full Name -->
                                    <label for="full_name_id" class="control-label">Identificación del colaborador</label>
                                    <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="">
                                </div>    
                            
                                <div class="form-group"> <!-- Street 1 -->
                                    <label for="street1_id" class="control-label" >Nombre del colaborador</label>
                                    <input type="text" class="form-control" id="street1_id" name="street1" placeholder="" readonly>
                                </div>                    
                                                        
                                
                              </div>
                            </div>
                          </div>
                          <div class="tab">
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group"> <!-- Full Name -->
                                    <label for="full_name_id" class="control-label">Tipo de retiro</label>
                                    <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="">
                                </div>                              
                              </div>
                            </div>
                          </div>
                          <div class="tab">
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group"> <!-- Full Name -->
                                    <label for="full_name_id" class="control-label">Calificación</label>
                                    <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="">
                                </div>                       
                              </div>
                            </div>
                          </div>
                          <div class="tab">
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group"> <!-- Full Name -->
                                    <label for="full_name_id" class="control-label">Ultimo día laborado</label>
                                    <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="">
                                </div>                       
                              </div>
                            </div>
                          </div>
                          <div class="tab">
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group"> <!-- Full Name -->
                                    <label for="full_name_id" class="control-label">Full Name</label>
                                    <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                                </div> 
                                <div class="form-group"> <!-- Full Name -->
                                  <label for="full_name_id" class="control-label">Full Name</label>
                                  <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                                </div> 
                                <div class="form-group"> <!-- Full Name -->
                                  <label for="full_name_id" class="control-label">Full Name</label>
                                  <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                                </div>                       
                              </div>
                            </div>
                          </div>
                          <div class="tab">
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group"> <!-- Full Name -->
                                    <label for="full_name_id" class="control-label">Full Name</label>
                                    <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                                </div> 
                                <div class="form-group"> <!-- Full Name -->
                                  <label for="full_name_id" class="control-label">Full Name</label>
                                  <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                                </div> 
                                <div class="form-group"> <!-- Full Name -->
                                  <label for="full_name_id" class="control-label">Full Name</label>
                                  <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                                </div>
                                <div class="form-group"> <!-- Full Name -->
                                  <label for="full_name_id" class="control-label">Full Name</label>
                                  <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                                </div>
                                <div class="form-group"> <!-- Full Name -->
                                  <label for="full_name_id" class="control-label">Full Name</label>
                                  <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                                </div>                       
                              </div>
                            </div>
                          </div>
                          <div class="tab">
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group"> <!-- Full Name -->
                                    <label for="full_name_id" class="control-label">Full Name</label>
                                    <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                                </div> 
                                <div class="form-group"> <!-- Full Name -->
                                  <label for="full_name_id" class="control-label">Full Name</label>
                                  <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                                </div> 
                                <div class="form-group"> <!-- Full Name -->
                                  <label for="full_name_id" class="control-label">Full Name</label>
                                  <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                                </div>
                                <div class="form-group"> <!-- Full Name -->
                                  <label for="full_name_id" class="control-label">Full Name</label>
                                  <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                                </div>
                                <div class="form-group"> <!-- Full Name -->
                                  <label for="full_name_id" class="control-label">Full Name</label>
                                  <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                                </div>                       
                              </div>
                            </div>
                          </div>
                          <div class="tab">
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group"> <!-- Full Name -->
                                    <label for="full_name_id" class="control-label">Full Name</label>
                                    <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                                </div> 
                                <div class="form-group"> <!-- Full Name -->
                                  <label for="full_name_id" class="control-label">Full Name</label>
                                  <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                                </div> 
                                <div class="form-group"> <!-- Full Name -->
                                  <label for="full_name_id" class="control-label">Full Name</label>
                                  <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                                </div>                      
                              </div>
                            </div>
                          </div>
                          <div class="tab">
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group"> <!-- Full Name -->
                                    <label for="full_name_id" class="control-label">Full Name</label>
                                    <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                                </div> 
                                <div class="form-group"> <!-- Full Name -->
                                  <label for="full_name_id" class="control-label">Full Name</label>
                                  <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                                </div> 
                                <div class="form-group"> <!-- Full Name -->
                                  <label for="full_name_id" class="control-label">Full Name</label>
                                  <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                                </div>                      
                              </div>
                            </div>
                          </div>
                          <div class="tab">
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group"> <!-- Full Name -->
                                    <label for="full_name_id" class="control-label">Full Name</label>
                                    <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                                </div> 
                                <div class="form-group"> <!-- Full Name -->
                                  <label for="full_name_id" class="control-label">Full Name</label>
                                  <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                                </div> 
                                               
                              </div>
                            </div>
                          </div>
                       
                      
                        <div style="overflow:auto;">
                          <div >
                            {{-- <div style="float:right;"> --}}
                            <button style="float:left;background-color:#03b4a1;color:#fff" class="col-md-4 btn "  type="button" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
                            <button style="float:right;background-color:#fc007e;color:#fff" class="col-md-4 btn " type="button" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
                          </div>
                        </div>
                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                        </div>
                      </form>
                
            </div>
        </div>
        
    </div>
</div>
<script>
  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab
  function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
      document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
  }
  function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
      // ... the form gets submitted:
      document.getElementById("regForm").submit();
      return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
  }
  function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
      // If a field is empty...
      if (y[i].value == "") {
        // add an "invalid" class to the field:
        y[i].className += " invalid";
        // and set the current valid status to false
        valid = false;
      }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
  }
  function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
  }
  </script>
@endsection


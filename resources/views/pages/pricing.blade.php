@extends('layouts.splash')
@section('center')
	<div class="panel panel-default">
		<div class="panel-body">
	        <div class="row">
	            <div class="col-xs-12">
	            	<h2>Pricing</h2>
                    <p style="margin-bottom:25px;">Note: Stream Plans available by Pre-order:</p>
                    <div class="row" style="font-size:22px;">
                        <div class="col-xs-12 col-sm-12 col-md-10">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 text-center">
                                    <a href="javascript:void(0)" class="plans-link" data-option="invite">By Invite</a>
                                </div>
                                <div class="col-xs-12 col-sm-4 text-center">
                                    <a href="javascript:void(0)" class="plans-link" data-option="cloud">Cloud</a>
                                </div>
                                <div class="col-xs-12 col-sm-4 text-center">
                                    <a href="javascript:void(0)" class="plans-link" data-option="standalone">Standalone</a>
                                </div>
                            </div>
                            <hr style="margin-bottom:0" />
                        </div>
                    </div>
                    <h3 class="invite" style="display:none">By Invite</h3>
                    <!--pricing tables 1-->
                    <section class="row invite" style="display:none">
                        <div class="col-xs-12 col-sm-12 col-md-10">
                            <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                    <div class="list-group">
                                    <a href="#" class="list-group-item active">
                                        <h4 class="list-group-item-heading">Basic</h4>
                                        <h6>Free to get started</h6>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 100 - more about this</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 2 - this is more about this</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 3 GB</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 4</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Feature</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Feature</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <button class="btn btn-primary btn-lg btn-block">$0 per month Pre-order</button>
                                    </a>
                                    </div>
                            </div><!--/left-->        
                            <div class="col-sm-4 col-xs-12">
                                    <div class="list-group text-center">
                                    <a href="#" class="list-group-item active">
                                        <h4 class="list-group-item-heading">Better</h4>
                                        <h6>Most popular plan</h6>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 200 - more about this</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 2 - this is more about this</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 5 GB</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 6</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Feature</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Feature</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <button class="btn btn-primary btn-lg btn-block">$10 per month Pre-order</button>
                                    </a>
                                    </div>
                            </div><!--/middle-->
                            <div class="col-sm-4 col-xs-12">
                                    <div class="list-group text-right">
                                    <a href="#" class="list-group-item active">
                                        <h4 class="list-group-item-heading">Best</h4>
                                        <h6>For enterprise grade</h6>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 100 - more about this</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 2 - this is more about this</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 8 GB</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 10</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Unlimited</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Unlimited</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <button class="btn btn-primary btn-lg btn-block">$20 per month Pre-order</button>
                                    </a>
                                    </div>
                            </div><!--/right-->
                            </div><!--/row-->
                        </div>
                    </section>   
                    <h3 class="cloud">Cloud</h3>
                    <!--pricing tables 1-->
                    <section class="row cloud">
                        <div class="col-xs-12 col-sm-12 col-md-10">
                            <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                    <div class="list-group">
                                    <a href="#" class="list-group-item active">
                                        <h4 class="list-group-item-heading">Basic</h4>
                                        <h6>Free to get started</h6>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 100 - more about this</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 2 - this is more about this</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 3 GB</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 4</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Feature</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Feature</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <button class="btn btn-primary btn-lg btn-block">$0 per month Pre-order</button>
                                    </a>
                                    </div>
                            </div><!--/left-->        
                            <div class="col-sm-4 col-xs-12">
                                    <div class="list-group text-center">
                                    <a href="#" class="list-group-item active">
                                        <h4 class="list-group-item-heading">Better</h4>
                                        <h6>Most popular plan</h6>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 200 - more about this</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 2 - this is more about this</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 5 GB</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 6</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Feature</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Feature</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <button class="btn btn-primary btn-lg btn-block">$10 per month Pre-order</button>
                                    </a>
                                    </div>
                            </div><!--/middle-->
                            <div class="col-sm-4 col-xs-12">
                                    <div class="list-group text-right">
                                    <a href="#" class="list-group-item active">
                                        <h4 class="list-group-item-heading">Best</h4>
                                        <h6>For enterprise grade</h6>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 100 - more about this</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 2 - this is more about this</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 8 GB</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 10</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Unlimited</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Unlimited</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <button class="btn btn-primary btn-lg btn-block">$20 per month Pre-order</button>
                                    </a>
                                    </div>
                            </div><!--/right-->
                            </div><!--/row-->
                        </div>
                    </section>         
                    <h3 class="standalone" style="display:none">Standalone</h3>
                    <!--pricing tables 1-->
                    <section class="row standalone" style="display:none">
                        <div class="col-xs-12 col-sm-12 col-md-10">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                        <div class="list-group">
                                        <a href="#" class="list-group-item active">
                                            <h4 class="list-group-item-heading">Basic</h4>
                                            <h6>Free to get started</h6>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">Option 100 - more about this</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">Option 2 - this is more about this</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">Option 3 GB</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">Option 4</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">Feature</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">Feature</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <button class="btn btn-primary btn-lg btn-block">$0 per month Pre-order</button>
                                        </a>
                                        </div>
                                </div><!--/left-->        
                                <div class="col-sm-6 col-xs-12">
                                        <div class="list-group text-right">
                                        <a href="#" class="list-group-item active">
                                            <h4 class="list-group-item-heading">Best</h4>
                                            <h6>For enterprise grade</h6>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">Option 100 - more about this</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">Option 2 - this is more about this</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">Option 8 GB</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">Option 10</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">Unlimited</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">Unlimited</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <button class="btn btn-primary btn-lg btn-block">$20 per month Pre-order</button>
                                        </a>
                                        </div>
                                </div><!--/right-->
                            </div><!--/row-->
                        </div>
                    </section>  
	            </div>
	        </div>
		</div>
	</div>
@stop
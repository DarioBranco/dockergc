					    var getParams = function (url) {
							var params = {};
							var parser = document.createElement('a');
							parser.href = url;
							var query = parser.search.substring(1);
							var vars = query.split('&');
							for (var i = 0; i < vars.length; i++) {
								var pair = vars[i].split('=');
								params[pair[0]] = decodeURIComponent(pair[1]);
							}
							return params;
						};
						var waitingDialog = waitingDialog || (function ($) {
						'use strict';

						// Creating modal dialog's DOM
						var $dialog = $(
						'<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">' +
						'<div class="modal-dialog modal-m">' +
						'<div class="modal-content">' +
							'<div class="modal-header"><h3 style="margin:0;"></h3></div>' +
							'<div class="modal-body ">' +	
							'<div class="spinner-border text-success" role="status" align="center"></div>'+
							
							'</div>' +
						'</div></div></div>');

						return {
						/**
						 * Opens our dialog
						 * @param message Custom message
						 * @param options Custom options:
						 * 				  options.dialogSize - bootstrap postfix for dialog size, e.g. "sm", "m";
						 * 				  options.progressType - bootstrap postfix for progress bar type, e.g. "success", "warning".
						 */
						show: function (message, options) {
							// Assigning defaults
							if (typeof options === 'undefined') {
								options = {};
							}
							if (typeof message === 'undefined') {
								message = 'Loading';
							}
							var settings = $.extend({
								dialogSize: 'l',
								progressType: '',
								onHide: null // This callback runs after the dialog was hidden
							}, options);

							// Configuring dialog
							$dialog.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-lg');
							$dialog.find('.progress-bar').attr('class', 'progress-bar');
							if (settings.progressType) {
								$dialog.find('.progress-bar').addClass('progress-bar-' + settings.progressType);
							}
							$dialog.find('h3').text(message);
							// Adding callbacks
							if (typeof settings.onHide === 'function') {
								$dialog.off('hidden.bs.modal').on('hidden.bs.modal', function (e) {
									settings.onHide.call($dialog);
								});
							}
							// Opening dialog
							$dialog.modal();
						},
						/**
						 * Closes dialog
						 */
						hide: function () {
							$dialog.modal('hide');
						}
						};

						})(jQuery);
						
						
						var getResponse = function () {
							var res = $.ajax({
								url: "http://parsec2.unicampania.it:5432/getstatus?loggedin="+<?php echo $_SESSION["id"]?>,
								async: false,
								dataType: 'json'
							}).responseJSON;
							if(res["isDone"]){	
							return true;
							}
							else{
								console.log("false");
								return getResponse();
							}
						};
					    function modal(){
							waitingDialog.show('Fetching Data and Performing Calculation...');
							var params = getParams(window.location.href);
							console.log(params);
							
							if(!("day" in params) || !("lastday" in params) || !("id_pilot" in params)){
								console.log('no data');
							}
							else{
							  var day = params["day"].split(" ");
							  var lastday = params["lastday"].split(" ");
							  var id_pilot = params["id_pilot"];
							    $.ajax({
									  url: "http://parsec2.unicampania.it:5432/newevaluation?day1="+String(day[0])+"&day2="+String(lastday[0])+"&id_pilot="+String(id_pilot)+"&loggedin="+<?php echo $_SESSION["id"]?>+"&month1="+String(day[1])+"&year1="+String(day[2])+"&month2="+String(lastday[1])+"&year2="+String(lastday[2]),
									  type: "GET",
									  success: function(result) {
										console.log(result);
									  },
									  error: function(error) {
										console.log(error);
									  }
									});
						    var isdone = false;
							var  w;
						    w = new Worker("./assets/js/worker.js");
							w.postMessage(<?php echo $_SESSION["id"]?>);
                            
							w.onmessage = function(event){
								    
								    console.log(event.data);
									setTimeout(function () {
									$('.modal').modal('hide');
									
									window.location.replace("http://localhost:8080/dashboard.php?done=true");

								   }, 2000);
							};
								
						    }
							
							
							
							 
						}
						
						
						
						
						
						
						var getBusinessParams = function (url) {
							var params = {};
							var parser = document.createElement('a');
							parser.href = url;
							var query = parser.search.substring(1);
							var vars = query.split('&');
							for (var i = 0; i < vars.length; i++) {
								var pair = vars[i].split('=');
								params[pair[0]] = decodeURIComponent(pair[1]);
							}
							return params;
						};
						var waitingBusinessDialog = waitingDialog || (function ($) {
						'use strict';

						// Creating modal dialog's DOM
						var $businessdialog = $(
						'<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">' +
						'<div class="modal-dialog modal-m">' +
						'<div class="modal-content">' +
							'<div class="modal-header"><h3 style="margin:0;"></h3></div>' +
							'<div class="modal-body ">' +	
							'<div class="spinner-border text-success" role="status" align="center"></div>'+
							
							'</div>' +
						'</div></div></div>');

						return {
						/**
						 * Opens our dialog
						 * @param message Custom message
						 * @param options Custom options:
						 * 				  options.dialogSize - bootstrap postfix for dialog size, e.g. "sm", "m";
						 * 				  options.progressType - bootstrap postfix for progress bar type, e.g. "success", "warning".
						 */
						show: function (message, options) {
							// Assigning defaults
							if (typeof options === 'undefined') {
								options = {};
							}
							if (typeof message === 'undefined') {
								message = 'Loading';
							}
							var settings = $.extend({
								dialogSize: 'l',
								progressType: '',
								onHide: null // This callback runs after the dialog was hidden
							}, options);

							// Configuring dialog
							$dialog.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-lg');
							$dialog.find('.progress-bar').attr('class', 'progress-bar');
							if (settings.progressType) {
								$dialog.find('.progress-bar').addClass('progress-bar-' + settings.progressType);
							}
							$dialog.find('h3').text(message);
							// Adding callbacks
							if (typeof settings.onHide === 'function') {
								$dialog.off('hidden.bs.modal').on('hidden.bs.modal', function (e) {
									settings.onHide.call($dialog);
								});
							}
							// Opening dialog
							$dialog.modal();
						},
						/**
						 * Closes dialog
						 */
						hide: function () {
							$dialog.modal('hide');
						}
						};

						})(jQuery);
						
						
						var getBusinessResponse = function () {
							var res = $.ajax({
								url: "http://parsec2.unicampania.it:5432/getbusinessstatus?loggedin="+<?php echo $_SESSION["id"]?>,
								async: false,
								dataType: 'json'
							}).responseJSON;
							if(res["isDone"]){	
							return true;
							}
							else{
								console.log("false");
								return getBusinessResponse();
							}
						};
					    function businessmodal(){
							
							waitingBusinessDialog.show('Fetching Data and Performing Calculation...');
							var params = getBusinessParams(window.location.href);
							
							
							if(!("loc" in params) || !("dem" in params) || !("busMonth" in params)){
								alert('no data');
							}
							else{
							    $.ajax({
									
									  url: "http://parsec2.unicampania.it:5432/newbusinessevaluation?loc="+String(params["loc"])+"&dem="+String(params["dem"])+"&busMonth="+String(params["busMonth"])+"&yearkpi="+String(params["yearkpi"])+"&loggedin="+<?php echo $_SESSION["id"]?>,
									  type: "GET",
									  success: function(result) {
										console.log(result);
									  },
									  error: function(error) {
										console.log(error);
										alert(error);
									  }
									});
						    var isdone = false;
							var  w;
						    w = new Worker("./assets/js/worker.js");
							w.postMessage(<?php echo $_SESSION["id"]?>);
                            
							w.onmessage = function(event){
								    
								    console.log(event.data);
									  setTimeout(function () {
									$('.modal').modal('hide');
									
									window.location.replace("http://localhost:8080/dashboard.php?done2=true");

								   }, 2000);
							};
								
						    }
							
						}
					 

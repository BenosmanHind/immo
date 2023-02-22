@extends('layouts.dashboard-admin')
@section('content')

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
                <div class="row">
					<div class="col-xl-12 col-xxl-12">
						<div class="row">
							<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6 ">
								<div class="card overflow-hidden ">
									<div class="card-body  pt-4">
										<div class="row">
											<div class="col">
												<h5 class="mb-1">12</h5>
												<span class="text-success">Annonces</span>
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6 ">
								<div class="card overflow-hidden ">
									<div class="card-body  pt-4">
										<div class="row">
											<div class="col">
												<h5 class="mb-1">20</h5>
												<span class="text-success">Clients</span>
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6 ">
								<div class="card overflow-hidden ">
									<div class="card-body  pt-4">
										<div class="row">
											<div class="col">
												<h5 class="mb-1">10</h5>
												<span class="text-success">Commentaires</span>
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6 ">
								<div class="card overflow-hidden ">
									<div class="card-body  pt-4">
										<div class="row">
											<div class="col">
												<h5 class="mb-1">5</h5>
												<span class="text-success">Clients</span>
											</div>
										</div>
									</div>

								</div>
							</div>
                            <div class="col-xl-6 col-xxl-6 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="card-title">Les dernières inscriptions</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-responsive-sm mb-0">
												<thead>
													<tr>
														<th style="width:20px;">
															<div class="custom-control custom-checkbox checkbox-primary check-lg mr-3">
																<input type="checkbox" class="custom-control-input" id="checkAll" required="">
																<label class="custom-control-label" for="checkAll"></label>
															</div>
														</th>
														<th><strong>Nom complet</strong></th>
														<th><strong>Téléphone</strong></th>
														<th><strong>Email</strong></th>
														<th><strong>STATUS</strong></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<div class="custom-control custom-checkbox check-lg mr-3">
																<input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
																<label class="custom-control-label" for="customCheckBox2"></label>
															</div>
														</td>
														<td><b>Atik romaissa</b></td>
														<td>0541259878</td>
														<td>romaissa@gmail.com</td>
														<td class="recent-stats d-flex align-items-center"><span class="badge badge-warning">En attente</span></td>

													</tr>
													<tr>
														<td>
															<div class="custom-control custom-checkbox check-lg mr-3">
																<input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
																<label class="custom-control-label" for="customCheckBox2"></label>
															</div>
														</td>
														<td><b>Atik romaissa</b></td>
														<td>0541259878</td>
														<td>romaissa@gmail.com</td>
														<td class="recent-stats d-flex align-items-center"><span class="badge badge-warning">En attente</span></td>

													</tr>
													<tr>
														<td>
															<div class="custom-control custom-checkbox check-lg mr-3">
																<input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
																<label class="custom-control-label" for="customCheckBox2"></label>
															</div>
														</td>
														<td><b>Atik romaissa</b></td>
														<td>0541259878</td>
														<td>romaissa@gmail.com</td>
														<td class="recent-stats d-flex align-items-center"><span class="badge badge-warning">En attente</span></td>

													</tr>
													<tr>
														<td>
															<div class="custom-control custom-checkbox check-lg mr-3">
																<input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
																<label class="custom-control-label" for="customCheckBox2"></label>
															</div>
														</td>
														<td><b>Atik romaissa</b></td>
														<td>0541259878</td>
														<td>romaissa@gmail.com</td>
														<td class="recent-stats d-flex align-items-center"><span class="badge badge-warning">En attente</span></td>

													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
                            <div class="col-xl-6 col-xxl-6 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="card-title">Les dernières annonces</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-responsive-sm mb-0">
												<thead>
													<tr>
														<th style="width:20px;">
															<div class="custom-control custom-checkbox checkbox-primary check-lg mr-3">
																<input type="checkbox" class="custom-control-input" id="checkAll" required="">
																<label class="custom-control-label" for="checkAll"></label>
															</div>
														</th>
														<th><strong>Désignation</strong></th>
														<th><strong>Vendeur</strong></th>
														<th><strong>Catégorie</strong></th>
                                                        <th><strong>Type</strong></th>
														<th><strong>STATUS</strong></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<div class="custom-control custom-checkbox check-lg mr-3">
																<input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
																<label class="custom-control-label" for="customCheckBox2"></label>
															</div>
														</td>
														<td>STUDIO TOULOUSE</td>
                                                        <td>Atik Romaissa</td>
                                                        <td>Studio</td>
                                                        <td>location </td>
                                                        <td><span class="badge badge-warning">En attente</span></td>

													</tr>
													<tr>
														<td>
															<div class="custom-control custom-checkbox check-lg mr-3">
																<input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
																<label class="custom-control-label" for="customCheckBox2"></label>
															</div>
														</td>
														<td>STUDIO TOULOUSE</td>
                                                        <td>Atik Romaissa</td>
                                                        <td>Studio</td>
                                                        <td>location </td>
                                                        <td><span class="badge badge-warning">En attente</span></td>

													</tr>
													<tr>
														<td>
															<div class="custom-control custom-checkbox check-lg mr-3">
																<input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
																<label class="custom-control-label" for="customCheckBox2"></label>
															</div>
														</td>
														<td>STUDIO TOULOUSE</td>
                                                        <td>Atik Romaissa</td>
                                                        <td>Studio</td>
                                                        <td>location </td>
                                                        <td><span class="badge badge-warning">En attente</span></td>

													</tr>
													<tr>
														<td>
															<div class="custom-control custom-checkbox check-lg mr-3">
																<input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
																<label class="custom-control-label" for="customCheckBox2"></label>
															</div>
														</td>
														<td>STUDIO TOULOUSE</td>
                                                        <td>Atik Romaissa</td>
                                                        <td>Studio</td>
                                                        <td>location </td>
                                                        <td><span class="badge badge-warning">En attente</span></td>

													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-4 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="card-title">Info inscriptions</h4>
									</div>
									<div class="card-body">
										<div id="DZ_W_TimeLine1" class="widget-timeline dz-scroll style-1" style="height:250px;">
											<ul class="timeline">
												<li>
													<div class="timeline-badge warning"></div>
													<a class="timeline-panel text-muted" href="#">

														<h6 class="mb-0"><strong class="text-warning">5</strong> en attente(s)</h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge success">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<h6 class="mb-0"><strong class="text-success">10</strong> validé(s)</h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge danger">
													</div>
													<a class="timeline-panel text-muted" href="#">

														<h6 class="mb-0"><strong class="text-danger">5</strong> annulé(s)</h6>
													</a>
												</li>

											</ul>
										</div>
									</div>
								</div>
							</div>
                            <div class="col-xl-3 col-xxl-4 col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-header pb-0 border-0">
                                        <h4 class="card-title text-white">TOP VENDEURS</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="widget-media">
                                            <ul class="timeline">

                                                <li>
                                                    <div class="timeline-panel">
                                                        <div class="media mr-2">
                                                            <img alt="image" width="50" src="{{asset('dashboard/images/avatar/1.jpg')}}">
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="mb-1 text-white"> Atik romaissa</h5>
                                                            <small class="d-block">10 annonce(s) </small>
                                                        </div>

                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="timeline-panel">
                                                        <div class="media mr-2">
                                                            <img alt="image" width="50" src="{{asset('dashboard/images/avatar/1.jpg')}}">
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="mb-1 text-white"> Atik romaissa</h5>
                                                            <small class="d-block">8 annonce(s) </small>
                                                        </div>

                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="timeline-panel">
                                                        <div class="media mr-2">
                                                            <img alt="image" width="50" src="{{asset('dashboard/images/avatar/1.jpg')}}">
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="mb-1 text-white"> Atik romaissa</h5>
                                                            <small class="d-block">5 annonce(s) </small>
                                                        </div>

                                                    </div>
                                                </li>

                                             </ul>
                                        </div>
                                    </div>

                                </div>


                            </div>
                                </div>

						</div>
					</div>


						<!-- <div class="col-lg-12 col-sm-12">
                                <div class="card bg-primary">
                                    <div class="card-header border-0 pb-0">
                                        <h4 class="card-title">Dual Line Chart</h4>
                                    </div>
                                    <div class="card-body">

                                    </div>
									 <canvas id="lineChart_3Kk"></canvas>
                                </div>
                            </div> -->


					</div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection

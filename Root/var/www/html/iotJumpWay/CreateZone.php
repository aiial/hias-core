<?php session_start();

$pageDetails = [
	"PageID" => "IoT",
	"SubPageID" => "IoT",
	"LowPageID" => "Application"
];

include dirname(__FILE__) . '/../../Classes/Core/init.php';
include dirname(__FILE__) . '/../../Classes/Core/GeniSys.php';
include dirname(__FILE__) . '/../iotJumpWay/Classes/iotJumpWay.php';

$_GeniSysAi->checkSession();

$LId = 1;
$Location = $iotJumpWay->getLocation($LId);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="robots" content="noindex, nofollow" />

		<title><?=$_GeniSys->_confs["meta_title"]; ?></title>
		<meta name="description" content="<?=$_GeniSys->_confs["meta_description"]; ?>" />
		<meta name="keywords" content="" />
		<meta name="author" content="hencework"/>

		<script src="https://kit.fontawesome.com/58ed2b8151.js" crossorigin="anonymous"></script>

		<link type="image/x-icon" rel="icon" href="<?=$domain; ?>/img/favicon.png" />
		<link type="image/x-icon" rel="shortcut icon" href="<?=$domain; ?>/img/favicon.png" />
		<link type="image/x-icon" rel="apple-touch-icon" href="<?=$domain; ?>/img/favicon.png" />

		<link href="<?=$domain; ?>/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
		<link href="<?=$domain; ?>/dist/css/style.css" rel="stylesheet" type="text/css">
		<link href="<?=$domain; ?>/AI/GeniSysAI/Media/CSS/GeniSys.css" rel="stylesheet" type="text/css">
	</head>

	<body id="GeniSysAI">

		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>

		<div class="wrapper theme-6-active pimary-color-pink">

			<?php include dirname(__FILE__) . '/../Includes/Nav.php'; ?>
			<?php include dirname(__FILE__) . '/../Includes/LeftNav.php'; ?>
			<?php include dirname(__FILE__) . '/../Includes/RightNav.php'; ?>

			<div class="page-wrapper">
			<div class="container-fluid pt-25">

				<?php include dirname(__FILE__) . '/../Includes/Stats.php'; ?>

				<div class="row">
					<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view panel-refresh">
							<div class="panel-heading">
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<?php include dirname(__FILE__) . '/../Includes/Weather.php'; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<?php include dirname(__FILE__) . '/../iotJumpWay/Includes/iotJumpWay.php'; ?>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view panel-refresh">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Create Zone</h6>
								</div>
								<div class="pull-right"></div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="form-wrap">
										<hr class="light-grey-hr"/>
										<form data-toggle="validator" role="form" id="zone_create">
											<div class="row">
												<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label for="name" class="control-label mb-10">Name</label>
														<input type="text" class="form-control" id="name" name="name" placeholder="Zone Name" required value="">
														<span class="help-block"> Name of zone</span>
													</div>
													<div class="form-group">
														<label class="control-label mb-10">Category</label>
														<select class="form-control" id="category" name="category">

															<option value="">PLEASE SELECT</option>

															<?php
																$categories = $iotJumpWay->getZoneCategories();
																if(count($categories)):
																	foreach($categories as $key => $value):
															?>

															<option value="<?=$value["category"]; ?>"><?=$value["category"]; ?></option>

															<?php
																	endforeach;
																endif;
															?>

														</select>
														<span class="help-block">Zone category</span>
													</div>
													<div class="form-group">
														<label for="name" class="control-label mb-10">Description</label>
														<input type="text" class="form-control" id="description" name="description" placeholder="iotJumpWay Location description" required value="">
														<span class="help-block"> Description of iotJumpWay Zone</span>
													</div>
													<div class="form-group">
														<label for="name" class="control-label mb-10">Coordinates</label>
														<input type="text" class="form-control" id="coordinates" name="coordinates" placeholder="iotJumpWay Location coordinates" required value="">
														<span class="help-block">iotJumpWay Zone coordinates</span>
													</div>
													<div class="form-group mb-0">
														<input type="hidden" class="form-control" id="create_zone" name="create_zone" required value="1">
														<button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">Create Zone</span></button>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label mb-10">Location</label>
														<select class="form-control" id="lid" name="lid" required>
															<option value="">PLEASE SELECT</option>

															<?php
																$Locations = $iotJumpWay->getLocations();
																if(count($Locations["Data"])):
																	foreach($Locations["Data"] as $key => $value):
															?>

															<option value="<?=$value["lid"]["value"]; ?>">#<?=$value["lid"]["value"]; ?>: <?=$value["name"]["value"]; ?></option>

															<?php
																	endforeach;
																endif;
															?>

														</select>
														<span class="help-block"> Location of zone</span>
													</div>
													<div class="clearfix"></div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<?php include dirname(__FILE__) . '/../Includes/Footer.php'; ?>

		</div>

		<?php  include dirname(__FILE__) . '/../Includes/JS.php'; ?>

		<script type="text/javascript" src="<?=$domain; ?>/iotJumpWay/Classes/mqttws31.js"></script>
		<script type="text/javascript" src="<?=$domain; ?>/iotJumpWay/Classes/iotJumpWay.js"></script>
		<script type="text/javascript" src="<?=$domain; ?>/iotJumpWay/Classes/iotJumpWayUI.js"></script>
	</body>

</html>

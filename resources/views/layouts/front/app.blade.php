<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>ԿԱՍ</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="/assets/css/zoomslider.css">
	<link rel="stylesheet" href="/assets/css/style.css">
	<link rel="stylesheet" href="/assets/css/custom.css">
	</head>
<body>
	@php
		$last_about_us = App\Models\AboutUs::orderBy('id','desc')->limit(2)->get();
		$news_categories = App\Models\NewsCategories::orderBy('id','desc')->get();
		$education_resources = App\Models\EducationalResources::orderBy('id','desc')->get();
		$events_categories = App\Models\EventsCategories::orderBy('id','desc')->get();
		$trainings_categories = App\Models\TrainingCategories::orderBy('id','desc')->get();
	@endphp
	<div class="container">
		<div class="header">
			<div class="text-right top-nav">
				<span data-lang="am" class="icon_arm changeLanguageHeader" data-current-url="{{URL::full()}}">Հայ</span>
				<span data-lang="en" class="icon_eng changeLanguageHeader" data-current-url="{{URL::full()}}" style='margin-left:7px'>Eng</span>
			</div>

			<div class="header-line row">
			<img src="/images/1.png">
			</div>
		</div>
		<div class="row nav-wrapper">
			<ul class="nav-menu text-center">
				<li><a>{{ trWord('about_us') }}</a>
					<ul>
						@foreach($last_about_us as $res)
						<li><a href="{{route('about.us.display',['id'=>$res->id,'lang'=>mainLang()])}}">{{$res['title_'.mainLang()]}}</a></li>
						@endforeach
					</ul>
				</li>
				<li><a>{{ trWord('news') }}</a>
					<ul>
						@foreach($news_categories as $cat)
							<li><a href="{{route('news.category.display',['id'=>$cat->id,'lang'=>mainLang()])}}">{{$cat['name_'.mainLang()]}}</a></li>
						@endforeach
					</ul>
				</li>
				<li>
					<a>{{ trWord('educational_resources') }}</a>
					<ul>
						@foreach($education_resources as $res)
							<li><a href="{{route('education.resources.display',['id'=>$res->id,'lang'=>mainLang()])}}">{{$res['title_'.mainLang()]}}</a></li>
						@endforeach
					</ul>
				</li>
				<li>
					<a>{{ trWord('events') }}</a>
					<ul>
						@foreach($events_categories as $cat)
							<li><a href="{{route('events.category.display',['id'=>$cat->id,'lang'=>mainLang()])}}">{{$cat['name_'.mainLang()]}}</a></li>
						@endforeach
					</ul>
				</li>
				<li>
					<a>{{ trWord('trainings') }}</a>
					<ul>
						@foreach($trainings_categories as $cat)
							<li><a href="{{route('trainings.category.display',['id'=>$cat->id,'lang'=>mainLang()])}}">{{$cat['name_'.mainLang()]}}</a></li>
						@endforeach
					</ul>
				</li>
			</ul>
		</div>
		<div class="row">
                    @yield('content')
				<div class="col-lg-4 widgets">
					<div class="text-right">
	<select id="months">
		<option value="01">Հունվար</option>
		<option value="02">Փետրվար</option>
		<option value="03">Մարտ</option>
		<option value="04" selected="selected">Ապրիլ</option>
		<option value="05">Մայիս</option>
		<option value="06">Հունիս</option>
		<option value="07">Հուլիս</option>
		<option value="08">Օգոստոս</option>
		<option value="09">Սեպտեմբեր</option>
		<option value="10">Հոկտեմբեր</option>
		<option value="11">Նոյեմբեր</option>
		<option value="12">Դեկտեմբեր</option>
	</select>
	<select id="years">
				<option value="2014">2014</option>
				<option value="2004">2004</option>
				<option value="-0001">-0001</option>
				<option value="2015">2015</option>
				<option value="0015">0015</option>
				<option value="2011">2011</option>
				<option value="2012">2012</option>
				<option value="2013">2013</option>
				<option value="2016">2016</option>
				<option value="2017">2017</option>
				<option value="2018">2018</option>
				<option value="2019">2019</option>
				<option value="2022">2022</option>
			</select>
</div>
<div id="calendar_wrapper">
	<div class="clearfix">
	<div class="calendar">
													<span class="empty"></span>
								<span class="empty"></span>
								<span class="empty"></span>
								<span class="empty"></span>
								<span class="empty"></span>
																			<span>1</span>
																		<span class="sunday">2</span>
			<br>
																				<span>3</span>
																								<span>4</span>
																								<span>5</span>
																								<span>6</span>
																								<span>7</span>
																								<span>8</span>
																		<span class="sunday">9</span>
			<br>
																				<span>10</span>
																								<span>11</span>
																								<span>12</span>
																								<span>13</span>
																								<span>14</span>
																								<span>15</span>
																		<span class="sunday">16</span>
			<br>
																				<span>17</span>
																								<span>18</span>
																								<span>19</span>
																								<span>20</span>
																								<span>21</span>
																								<span>22</span>
																		<span class="sunday">23</span>
			<br>
																				<span>24</span>
																								<span>25</span>
																								<span>26</span>
																								<span>27</span>
																								<span>28</span>
																								<span>29</span>
																		<span class="sunday">30</span>
			<br>
						</div>
</div></div>
<div class="text-right">
	<h3>Սպասվող իրադարձություններ</h3>
			<p>Այս պահին սպասվող իրադարձություն չկա</p>
		<h3>Վերջին նորություններ</h3>
					<p><a href="https://ewb.am/am/events/view/126">ՀԱՅՏԱՐԱՐՈՒԹՅՈՒՆ ԳՆԱՆՇՄԱՆ ՀԱՐՑՄԱՆ ՄԱՍԻՆ</a></p>
				<p><a href="https://ewb.am/am/events/view/124">Հայտարարություն գնանշման հարցման մասին</a></p>
				<p><a href="https://ewb.am/am/events/view/123">«Չինաստանն իմ աչքերով» խորագրով միջոցառումների շարք ՀՀ դպրոցներում</a></p>
				<p><a href="https://ewb.am/am/events/view/120">«ՀԱՅ ԶԻՆՎՈՐԸ...» ԽՈՐԱԳՐՈՎ ՑՈՒՑԱՀԱՆԴԵՍ-ՄՐՑԱՆԱԿԱԲԱՇԽՈՒԹՅՈՒՆ</a></p>
				<p><a href="https://ewb.am/am/events/view/119">ԴԿՄ ԱՄԵՆԱՄՅԱ ՀԱՄԱԺՈՂՈՎ Ք. ԾԱՂԿԱՁՈՐՈՒՄ 2017Թ.</a></p>
			</div>				
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="/assets/js/custom.js"></script>

		<div class="row">
			<div class="footer">
				<div class="row">
					<div class="col-lg-12" style="text-align:center">
					<a href="http://www.edu.am/"><img src="images/partner_kgn.png"></a>
					<a href="http://www.cfep.am/"><img src="images/partner_tsig.png"></a>
					<a href="http://www.ktak.am/"><img src="images/partner_ktak.png"></a>
					<a href="http://www.aniedu.am/"><img src="images/partner_kai.png"></a>
					<a href="http://www.dilijanschool.org/"><img src="images/partner_dilijan.png"></a>
					<a href="http://www.atc.am/"><img src="images/partner_gtk.png"></a>
					<a href="http://confucius.brusov.am/"><img src="images/partner_konf.png"></a>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12" style="text-align:center">
						© 2013-2023, {{ trWord('scool_center_centers') }}
					</div>
				</div>
			</div>
		</div>
	</div>
</body></html>
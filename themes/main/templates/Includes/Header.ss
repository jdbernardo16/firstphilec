<div class="hdr-frame">
	<div class="hdr-top">
		<div class="top-cntnr inlineBlock-parent">
			<a href="careers">CAREERS</a><p>|</p><a href="contact-us">CONTACT US</a>
		</div>
	</div>
	<div class="header">
		<div class="vertical-parent">
			<div class="vertical-align">
				<div class="inlineBlock-parent">
					<div class="header__logo-cntnr">
						<a href="$AbsoluteBaseURL"><div class="header__logo" style="background-image: url('$Logo.URL');"></div></a>
					</div
					><div class="header__menu-cntnr">
						<div class="header__menu-hldr">
							<div class="inlineBlock-parent">
								<% loop Menu(1) %><div class="link-hldr $Linkingmode">
									<a href="$Link">$Title</a>
								</div><% end_loop %>
								<div class="search-icon">
									<div class="vertical-parent">
										<div class="vertical-align">
											<i class="fas fa-search"></i>
										</div>
									</div>
								</div
								><div class="bar-hldr">
									<div class="vertical-parent">
										<div class="vertical-align">
											<i class="fas fa-bars"></i>
										</div>
									</div>
								</div>
							</div>	
						</div
						><div class="search-bar-holder">
							<form class="search-form" action="{$BaseHref}search" method="GET">
								<div class="vertical-parent">
									<div class="vertical-align">
										<div class="search-input inlineBlock-parent">
											<input type="text" name="p" placeholder="Search Here..."><div class="cbutton search-exit"><i class="fas fa-times"></i></div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="mobile-menu">
			<div class="exit-btn">
				<i class="fas fa-times"></i>
			</div>
			<div class="mobile-logo">
				<% loop HeaderFooter %>
					<div class="logo" style="background-image: url('$Logo.URL');"></div>
				<% end_loop %>
			</div>
			<div class="m-link-hldr">
				<% loop Menu(1).limit(3) %>
				<div class="link-cntnr $Linkingmode">
					<a href="$Link">$Title</a>
				</div
				><% end_loop %><div class="link-cntnr prog">
					<p>HOMe Program</p><i class="fas fa-caret-right"></i>
				</div
				><div class="link-cntnr dropdown">
					<a href="about-home" class="m-margin-b">About HOMe</a>
					<a href="the-science">The Science</a>
				</div
				><div class="link-cntnr">
					<div class="doclink">
						<a href="dr-cenia-m-d">Dr. Cenia M.D.</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

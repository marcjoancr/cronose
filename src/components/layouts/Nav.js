import React from 'react';
import { BrowserRouter, NavLink, Route, Switch } from 'react-router-dom';

function NavBar(props) {
	return (
		<BrowserRouter basename={props.basename} forceRefresh={props.refresh}>
			<nav className='navbar navbar-expand-md w-100'>
				<a class='navbar-brand' href='#'>
					Cronose
				</a>
				<div className='h-nav collapse navbar-collapse d-flex flex-row-reverse mr-4 mt-2'>
					<ul className='navbar-nav'>
						{props.routes.map((route, index) => (
							<li key={index} className='item'>
								<NavLink
									to={route.path}
									exact={route.exact}
									className='nav-item mr-2 px-3 py-2'
									activeClassName='active'>
									{route.title}
								</NavLink>
							</li>
						))}
					</ul>
				</div>
			</nav>
			<main className='w-100'>{SwitchRoutes(props.routes)}</main>
		</BrowserRouter>
	);
}

function SideBar(props) {
	return (
		<BrowserRouter basename={props.basename} forceRefresh={props.refresh}>
			<input type='checkbox' name='toggle' id='sidebar-toggle'></input>
			<label for='sidebar-toggle' className='menu-bg'></label>
			<nav className='vertical-nav'>
				<section className='navbar'>
					<label for='sidebar-toggle' class='menu-icon'>
						<i class='hamburger'></i>
					</label>
					<ul className='nav flex-column mb-0'>
						{props.routes.map((route, index) => (
							<li key={index} className='nav-item pt-3'>
								<NavLink
									to={route.path}
									exact={route.exact}
									className='text-white'
									activeClassName='active'>
									{route.title}
								</NavLink>
							</li>
						))}
					</ul>
				</section>
			</nav>
			<main className='vertical container-fluid'>
				{SwitchRoutes(props.routes)}
				<h1></h1>
			</main>
		</BrowserRouter>
	);
}

function SwitchRoutes(routes) {
	return (
		<Switch>
			{routes.map((route, index) => (
				<Route
					key={index}
					path={route.path}
					exact={route.exact}
					component={route.component}
				/>
			))}
		</Switch>
	);
}

export { NavBar, SideBar };

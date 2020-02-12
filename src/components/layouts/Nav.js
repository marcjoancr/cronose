import React from 'react';
import { BrowserRouter, NavLink, Route, Switch } from 'react-router-dom';

function NavBar(props) {
	return (
		<BrowserRouter basename={props.basename} forceRefresh={props.refresh}>
			<nav className='navbar navbar-expand-md'>
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
			<main>{SwitchRoutes(props.routes)}</main>
		</BrowserRouter>
	);
}

function SideBar(props) {
	return (
		<BrowserRouter basename={props.basename} forceRefresh={props.refresh}>
			<nav className='vertical-nav'>
				<section className='navbar'>
					<ul className='nav flex-column mb-0'>
						{props.routes.map((route, index) => (
							<li key={index} className='nav-item pt-3'>
								<NavLink
									to={route.path}
									exact={route.exact}
									activeClassName='active'>
									{route.title}
								</NavLink>
							</li>
						))}
					</ul>
				</section>
			</nav>
			<main>{SwitchRoutes(props.routes)}</main>
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

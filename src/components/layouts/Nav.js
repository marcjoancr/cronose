import React from 'react';
import { BrowserRouter, NavLink, Route, Switch } from 'react-router-dom';

function NavBar(props) {
	return (
		<BrowserRouter basename={props.basename} forceRefresh={props.refresh}>
			<nav className='navbar'>
				<ul className='menu'>
					{props.routes.map((route, index) => (
						<li key={index} className='item'>
							<NavLink
								to={route.path}
								exact={route.exact}
								activeClassName='active'>
								{route.title}
							</NavLink>
						</li>
					))}
				</ul>
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

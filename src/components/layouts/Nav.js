import React from 'react';
import { BrowserRouter, NavLink, Route, Switch } from 'react-router-dom';

function NavBar(props) {
	return (
		<BrowserRouter basename={props.basename} forceRefresh={props.refresh}>
			<nav className='navbar navbar-expand-md w-100'>
				<img className='img-logo' src='/assets/img/svg/logo.svg' />
				<a className='pl-3 navbar-brand' href='#'>
					Cronose
				</a>
				<div className='h-nav collapse navbar-collapse d-flex flex-row-reverse mr-4 mt-2'>
					<ul className='navbar-nav'>
						{props.routes.map((route, index) => (
							<>
								<li key={index} className='item'>
									<NavLink
										to={route.path}
										exact={route.exact}
										className='nav-item mr-2 px-3 py-2'
										activeClassName='active'>
										{route.title}
									</NavLink>
								</li>
							</>
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
			<nav className='sidebar-nav'>
				<section className='navbar'>
					<label htmlFor='sidebar-toggle' className='menu-icon'>
						<i className='hamburger'></i>
					</label>
					<img
						className='img-logo m-auto mt-4'
						src='/assets/img/svg/logo.svg'
					/>
					<ul className='nav flex-column mb-0 mt-4'>
						{props.routes.map((route, index) => (
							<li key={index} className='nav-item pt-4'>
								<NavLink
									to={route.path}
									exact={route.exact}
									className=''
									activeClassName='active'>
									<i className='icon'>{route.icon ? <route.icon /> : null}</i>
									<a>{route.title}</a>
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

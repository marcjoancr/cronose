import React from 'react';
import { BrowserRouter, NavLink, Route, Switch } from 'react-router-dom';

export default function SideBar(props) {
	return (
		<div>
			<nav className='vertical-nav'>
				<section className='navbar'>
					<BrowserRouter basename={props.basename}>
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
						<Switch>
							{props.routes.map((route, index) => (
								<Route
									key={index}
									path={route.path}
									exact={route.exact}
									component={route.component}
								/>
							))}
						</Switch>
					</BrowserRouter>
				</section>
			</nav>
		</div>
	);
}

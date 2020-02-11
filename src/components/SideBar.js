import React from 'react';
import { BrowserRouter, NavLink, Route, Switch } from 'react-router-dom';

export default function SideBar(props) {
	return (
		<nav className='sidebar'>
			<BrowserRouter basename={props.basename}>
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
		</nav>
	);
}

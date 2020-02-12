import React from 'react';

export default function AboutUs(props) {
	const data = props.data;

	return (
		<div className='container' id='about'>
			<h1>About Us</h1>
			<p>
				Cronose es un proyecto diseñado por cuatro estudiantes del instituto IES
				Manacor, Mallorca.
				<br />
				Dicho proyecto forma parte de la validación final del módulo superior de
				Desarrollo de Aplicaciones Web (DAW) como pieza fundamental en la
				obtención de las aptitudes necesarias.
				<br />
				Cronose parte de la idea de crear un banco de tiempo online, una
				herramienta capaz de conectar a usuarios registrados en la plataforma
				para intercambiar favores o trabajos entre ellos sin necesidad de pagar
				por estos servicios. Cada usuario aporta sus habilidades o conocimientos
				al resto de comunidad y en la misma medida puede utilizar los que el
				resto de usuarios le ofrecen.
			</p>
		</div>
	);
}

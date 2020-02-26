import React from 'react';
import { Map, TileLayer, Marker, Popup } from 'react-leaflet';
import L from 'leaflet';

const position = [39.5616104, 3.20025];

const styles = {
	wrapper: {
		height: 400,
		width: '100%',
		margin: '0 auto',
		display: 'flex',
	},
	map: {
		flex: 1,
	},
};

const Moves = (props) => {
	return (
		<div style={styles.wrapper}>
			<Map style={styles.map} center={props.center} zoom={props.zoom}>
				<TileLayer url={props.url} />
				<Marker position={position}>
					<Popup>
						<b>Aqui Estamos!</b>
					</Popup>
				</Marker>
			</Map>
		</div>
	);
};

Moves.defaultProps = {
	center: [39.561627, 3.199883],
	zoom: 16,
	url: 'https://tiles.stadiamaps.com/tiles/outdoors/{z}/{x}/{y}{r}.png',
};

export default function AboutUs(props) {
	const data = props.data;

	console.log(`${process.env.PUBLIC_URL}/assets/img/initial-ls.svg`);

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
			<Moves />
		</div>
	);
}

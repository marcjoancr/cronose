// export default function Wallet() {
// 	return (
// 		<div>
// 			<h1>Wallet</h1>
// 		</div>
// 	);
// }

import React, { PureComponent } from 'react';
import {
	LineChart,
	Line,
	XAxis,
	YAxis,
	CartesianGrid,
	Tooltip,
	Legend,
} from 'recharts';

const data = [
	{
		fecha: '11-1-2020',
		Coins: 0,
	},
	{
		fecha: '12-1-2020',
		Coins: 2,
	},
	{
		fecha: '13-1-2020',
		Coins: 4,
	},
	{
		fecha: '14-1-2020',
		Coins: 3,
	},
	{
		fecha: '15-1-2020',
		Coins: 5,
	},
];

export default class Example extends PureComponent {
	static jsfiddleUrl = 'https://jsfiddle.net/alidingling/xqjtetw0/';

	render() {
		return (
			<>
				<div className='text-center'>
					<LineChart
						width={1000}
						height={500}
						data={data}
						margin={{
							top: 5,
							right: 30,
							left: 20,
							bottom: 5,
						}}>
						<CartesianGrid strokeDasharray='3 3' />
						<XAxis dataKey='fecha' />
						<YAxis />
						<Tooltip />
						<Legend />
						<Line
							type='monotone'
							dataKey='Coins'
							stroke='#f09a24'
							activeDot={{ r: 8 }}
						/>
					</LineChart>
				</div>
			</>
		);
	}
}

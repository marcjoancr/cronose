import React from 'react';
import { MdAddCircleOutline } from 'react-icons/md';

export default function Chat() {
	return (
		<>
			<h1 className='text-center mt-4'>Chat</h1>
			<div className='container-fluid '>
				<div className='row card-chat mb-4'>
					<div className='chats col-md-3 col-4 p-1'>
						<div className='bg'>
							<div className='user-chat'>
								<div className='active row p-2'>
									<img
										className='pr-2'
										src='/assets/img/avatar-placeholder.png'
										height='55px'
									/>
									<div className='row '>
										<div className='col-12'>Anastasio</div>
										<small>Hola Anastasio</small>
									</div>
								</div>
							</div>
							<div className='user-chat'>
								<div className='row p-2'>
									<img
										className='pr-2'
										src='/assets/img/avatar-placeholder.png'
										height='55px'
									/>
									<div className='row'>
										<div className='col-12'>Username</div>
										<small>Lorem ipsum sdklj klsafl klsfdkjl...</small>
									</div>
								</div>
							</div>
							<div className='user-chat'>
								<div className='row p-2'>
									<img
										className='pr-2'
										src='/assets/img/avatar-placeholder.png'
										height='55px'
									/>
									<div className='row'>
										<div className='col-12'>Username</div>
										<small>Lorem ipsum sdklj klsafl klsfdkjl...</small>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div className='chat col-md-6 col-8 p-1'>
						<div className='messages mb-2'>
							<div className='user p-2'>
								<img
									className='pr-2'
									src='/assets/img/avatar-placeholder.png'
									height='40px'
								/>
								Anastasio
							</div>
							<div className='mt-1 scroll'>
								<div class='ml-3 mt-2 card bg-light rounded w-75'>
									<div class='card-body p-2'>
										<p class='card-text black-text'> Hola bernardo </p>
									</div>
								</div>
								<div class='mr-2 mt-2 card bg-primary rounded w-75 float-right'>
									<div class='card-body p-2'>
										<p class='card-text text-white'>Hola Anastasio</p>
									</div>
								</div>
							</div>
						</div>

						<div className='row'>
							<div className='pr-1 col-xl-10 col-8'>
								<input
									className='form-control'
									type='text'
									placeholder='Insert message here!'
									readonly
								/>
							</div>
							<div className='pl-1 col-xl-2 col-4'>
								<input className='btn w-100' type='submit' value='Submit' />
							</div>
						</div>
					</div>
					<div className='col-md-3 col-12 p-1 cards'>
						<div className='bg'>
							<h3 className='w-100 p-2 pt-3 m-0'>Cards</h3>
							<div className='row offer-card p-2'>
								<div className='col-12 text-center title'>Job Title</div>
								<div className='col-12 text-center'>12/03/2020</div>
								<div className='col-12 text-center'>
									<strong>Status:</strong> Pending
								</div>
							</div>
							<div className='row offer-card p-2'>
								<div className='col-12 text-center title'>Job Title</div>
								<div className='col-12 text-center'>01/03/2020</div>
								<div className='col-12 text-center'>
									<strong>Status:</strong> Done
								</div>
							</div>
							<div className='text-center mt-2'>
								<MdAddCircleOutline className='add' />
							</div>
						</div>
					</div>
				</div>
			</div>
		</>
	);
}

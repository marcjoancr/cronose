import React from 'react';
import Rater from 'react-rater';
import 'react-rater/lib/react-rater.css';

export default function NewOffer() {
	return (
		<div
			className='langSelector container shadow m-2 p-3 text-center'
			id='workForm'>
			<h5>¿En qué idioma ofrecerás tu trabajo?</h5>
			<p>Después podrás añadir más idiomas complementarios</p>
			<button
				className='btn btn-lg dropdown-toggle text-white'
				type='button'
				id='dropdownMenuButton'
				data-toggle='dropdown'
				aria-haspopup='true'
				aria-expanded='false'>
				Idiomas
			</button>
			<div
				id='langsAvaliable'
				className='dropdown-menu'
				aria-labelledby='dropdownMenuButton'></div>

			<div id='workForm2' className='container text-left'>
				<hr />

				<form>
					<div className='row'>
						<div className='form-group col'>
							<select
								className='form-control'
								id='dropdownCategory'
								data-toggle='dropdown'
								aria-haspopup='true'
								aria-expanded='false'>
								<option disabled selected>
									Categoría
								</option>
							</select>
							<small className='form-text text-muted'>
								Elige la categoría que mejor se ajuste al trabajo que deseas
								publicar
							</small>
						</div>

						<div className='form-group col'>
							<select
								className='form-control'
								id='dropdownSpecialization'
								data-toggle='dropdown'
								aria-haspopup='true'
								aria-expanded='false'>
								<option>Especialización</option>
							</select>
							<small className='form-text text-muted'>
								Elige la categoría que mejor se ajuste al trabajo que deseas
								publicar
							</small>
						</div>
					</div>
					<div className='form-group bg-secondary text-white p-2'>
						<label for='rating'>
							¿Cuál es tu nivel de profesionalidad en este sector?
						</label>
						<div className='col'>
							<Rater total={5} rating={0} />
						</div>
					</div>
					<div className='form-group'>
						<label for='workTitle'>Título</label>
						<input
							type='text'
							className='form-control'
							id='workTitle'
							aria-describedby='emailHelp'
							placeholder='Introduce tu título...'
						/>
						<small id='workSubtitle' className='form-text text-muted'>
							Utiliza un título lo más descriptivo posible
						</small>
					</div>
					<div className='form-group'>
						<label for='workTitle'>Descripción</label>
						<textarea
							type='text'
							className='form-control'
							id='workDescription'
							aria-describedby='emailHelp'
							placeholder='Describe tu actividad...'
							rows='5'></textarea>
						<small id='workSubtitle' className='form-text text-muted'>
							Indica lo que puedes ofrecer y otra información que quieres que
							sepan los demás usuarios.
						</small>
					</div>
					<hr/>
					<h3>Horario</h3>
					<div className='row mb-4 mt-1'>
						<div className='col-lg-8 my-auto'>
							<div className='form-check form-check-inline'>
								<input
									type='checkbox'
									className='form-check-input'
									id='materialInline1'
								/>
								<label className='form-check-label' for='materialInline1'>
									Lunes
								</label>
							</div>
							<div className='form-check form-check-inline'>
								<input
									type='checkbox'
									className='form-check-input'
									id='materialInline2'
								/>
								<label className='form-check-label' for='materialInline2'>
									Martes
								</label>
							</div>
							<div className='form-check form-check-inline'>
								<input
									type='checkbox'
									className='form-check-input'
									id='materialInline3'
								/>
								<label className='form-check-label' for='materialInline3'>
									Miércoles
								</label>
							</div>
							<div className='form-check form-check-inline'>
								<input
									type='checkbox'
									className='form-check-input'
									id='materialInline3'
								/>
								<label className='form-check-label' for='materialInline3'>
									Jueves
								</label>
							</div>
							<div className='form-check form-check-inline'>
								<input
									type='checkbox'
									className='form-check-input'
									id='materialInline3'
								/>
								<label className='form-check-label' for='materialInline3'>
									Viernes
								</label>
							</div>
							<div className='form-check form-check-inline'>
								<input
									type='checkbox'
									className='form-check-input'
									id='materialInline3'
								/>
								<label className='form-check-label' for='materialInline3'>
									Sábado
								</label>
							</div>
							<div className='form-check form-check-inline'>
								<input
									type='checkbox'
									className='form-check-input'
									id='materialInline3'
								/>
								<label className='form-check-label' for='materialInline3'>
									Domingo
								</label>
							</div>
							<small id='workSubtitle' className='form-text text-muted'>
								Indica los días que puedes reaizar el trabajo.
							</small>
						</div>
						<div className='col-lg-4'>
							<div className='form-row'>
								<div className='col'>
									<div className='md-form'>
										<label className="form-label" for ="date1">De las </label>
										<input
											type='text'
											id='date1'
											className='form-control'
											placeholder='00:00'
										/>
									</div>
								</div>
								<div className='col'>
									<div className='md-form'>
									<label className="form-label" for ="date2">Hasta las </label>
										<input
											type='email'
											id='date2'
											className='form-control'
											placeholder='00:00'
										/>
									</div>
								</div>
								<small id='workSubtitle' className='form-text text-muted'>
									Escribe de que hora a que hora puedes realizar el trabajo
								</small>
							</div>
						</div>
					</div>
					<input
						type='button'
						className='btn text-white'
						id='generateData'
						value='Previsualizar'
					/>
				</form>
			</div>
		</div>
	);
}

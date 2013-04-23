<?php /* Template Name: Nordgård Signupform */ ?>

<?php get_header(); ?>

<div class="row">
	<div class="span12 main">

		<div class="row">

			<div class="span3"></div>
			<div class="span6">
				<?php do_action('show_nordgard_passesleft'); ?>
				<hr/>
				<h3>Påmeldingsskjema</h3>
			</div>
			<div class="span3"></div>

		</div>

		<?php do_action('show_nordgard_showerror'); ?>

		<div class="row">

			<div class="span3"></div>

			<form method="post">
					
			<div class="span3">

					<div>
						<label>Fornavn</label>
						<input type="text" placeholder="Fornavn" name="Firstname" id="signup_firstname">
					</div>
					<div>
						<label>Etternavn</label>
						<input type="text" placeholder="Etternavn" name="Lastname" id="signup_lastname">
					</div>
					<div>
						<label>Bursdag</label>
						<input type="date" placeholder="Bursdag" name="Birthdate" id="signup_birthday">
					</div>
					<div>
						<label>Epost</label>
						<input type="text" placeholder="Epost" name="Email" id="signup_email">
					</div>
					<div>
						<label>Telefon</label>
						<input type="text" placeholder="Telefon" name="Phone" id="signup_phone">
					</div>
				</div>
				<div class="span3">
					<div>
						<label>Hjemkommune</label>
						<input type="text" placeholder="Hjemkommune" name="Postarea" id="signup_postarea">
					</div>
					<div>
						<label>Kordan fikk du høre om Nordgårdfestivalen?</label>
						<textarea type="text" placeholder="Kordan fikk du høre om Nordgårdfestivalen?" name="Refered" id="signup_refered"></textarea>
					</div>
					<div>
						<label>Har du en relasjon til <a href="http://nordgårdfestivalen.no/?page_id=24" target="_blank">vertskapet</a>?</label>
						<input type="text" placeholder="Har du en relasjon til vertskapet?" name="Relation" id="signup_relation">
					</div>
					<div>
						<label for="acceptTerms"><input type="checkbox" id="acceptTerms" name="acceptTerms" value="acceptedTerms">
						Æ har lest og godtar vilkåran under!</label>
					</div>
					<div>
						<button type="submit" class="btn">Registrer svar</button>	
					</div>
				</div>
			</form>
			<div class="span3"></div>

		</div>

		<div class="row">

			<div class="span3"></div>
			<div class="span6">

				<br/>
				<h3>Vilkår for påmelding:</h3>
				<ol>
					<li>Æ e kjent med at festivalpasset mitt e gratis, og at æ derfor skal jobbe ei frivilligvakt under festivalen.</li>
					<li>Æ love at æ har alle intensjona om å komme på Nordgårdfestivalen når æ nu melde mæ på, sjøl om æ ikkje har betalt penga for billetten. Det veit æ næmlig at gjør det mye lettere for arrangøran i planlegginga.</li>
					<li>Æ må betale en søt liten sum for mat på forhånd (informasjon kommer om frist), som fungerer som endelig bekreftelse på at æ kommer på Nordgårdfestivalen. Detta beløpet får æ igjæn i nyyydelig mat under festivalen. Æ veit også at æ miste festivalpasset mitt dersom æ ikkje betale innen fristen.</li>
					<li>Æ skal være med på å gjøre Nordgårdfestivalen fette nais!</li>
				</ol>
			</div>
			<div class="span3"></div>

		</div>

	</div>
</div>

<?php get_footer(); ?>
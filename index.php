<?php
$api = [
    'key' => '4924',
    'secret' => 'f4a539551ad788ac1944e6b2bb8ea6ff',
    'flow_url' => 'https://leadrock.com/URL-XXXXX-XXXXX'
];

function send_the_order($post, $api)
{
    $params = [
        'flow_url' => $api['flow_url'],
        'user_phone' => $post['phone'],
        'user_name' => $post['name'],
        'other' => $post['other'],
        'ip' => $_SERVER['REMOTE_ADDR'],
        'ua' => $_SERVER['HTTP_USER_AGENT'],
        'api_key' => $api['key'],
        'sub1' => $post['sub1'],
        'sub2' => $post['sub2'],
        'sub3' => $post['sub3'],
        'sub4' => $post['sub4'],
        'sub5' => $post['sub5'],
        'ajax' => 1,
    ];
    $url = 'https://leadrock.com/api/v2/lead/save';

    $trackUrl = $params['flow_url'] . (strpos($params['flow_url'], '?') === false ? '?' : '&') . http_build_query($params);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $trackUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    $params['track_id'] = curl_exec($ch);

    $params['sign'] = sha1(http_build_query($params) . $api['secret']);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_exec($ch);
    curl_close($ch);

    header('Location: ' . (empty($post['success_page']) ? 'confirm.html' : $post['success_page']));
}

if (!empty($_POST['phone'])) {
    send_the_order($_REQUEST, $api);
}

if (!empty($_GET)) {
?>
    <script type="text/javascript">
        window.onload = function() {
            let forms = document.getElementsByTagName("form");
            for(let i=0; i<form action="index.php" s.length; i++) {
                let form = forms[i];
                form.setAttribute('action', form.getAttribute('action') + "?<?php echo http_build_query($_GET)?>");
                form.setAttribute('method', 'post');
            }
        };
    </script>
<?php
}

?>
<html lang="it" dir="ltr">

<head>
	<meta charset="utf-8">
	<link href="css/all.css" rel="stylesheet" crossorigin="anonymous">
	<meta name="robots" content="nofollow, noindex">

	<title>ENERGY MIRROR</title>

	<meta name="MobileOptimized" content="width">
	<meta name="HandheldFriendly" content="true">
	<meta name="viewport" content="width=device-width">

	<link type="text/css" rel="stylesheet" href="css/energy-mirror.css" media="all">
	<link href="css/css_1.css" rel="stylesheet">
	<link href="css/css.css" rel="stylesheet">

</head>

<body>

	<div class="header">
		<div class="header-in">

			<div class="text-box text-white">
				<h2 class="title" title="">ENERGY MIRROR!</h2>
				<div style="color:#FFF;"> <b>Specchio</b> con luce led e <b>Power bank</b> per ricaricare il tuo
					telefono</div>
				<div class="space-30"><span class="single-image layer wow zoomIn"><img src="img/01.png" alt=""></span>
				</div>
				<a href="#webform" class="bttn-6">Aquista adesso!</a>
			</div>

			<div class="single-image layer wow zoomIn"></div>

		</div>
	</div>

	<section class="block2 firsto">
		<div class="block2-inside">

			<div class="cb2-image cb-image">
				<div class="cb2-image-inside">
					<img typeof="foaf:Image" src="img/01.jpg" alt="">
				</div>
			</div>


			<div class="block2-1">
				<div class="block2-1-inside">
					<h2 class="title" title="Book your flights from anywhere">ILLUMINA LA TUA BELLEZZA CON UNA LUCE
						NATURALE</h2>
					<p>Specchio professionale, con luce LED a lunga durata.<br>Potrai truccarti a lungo senza che la
						luce perda di potenza.</p>
					<a href="#webform" class="bttn-6">Ultimi prodotti disponibili</a>
				</div>
			</div>

		</div>
	</section>


	<section class="block2 righto features">
		<div class="block2-inside">


			<div class="block2-1">
				<div class="block2-1-inside">
					<h2 class="title" title="Book your flights from anywhere">Caratteristiche</h2>
					<div class="flexi-chara">
						<div class="flexi-item">
							<div class="flexi-item-in">
								<img src="img/f1.jpg">
								<p>Specchio standard, la pelle è visibile in ogni aspetto</p>
							</div>
						</div>
						<div class="flexi-item">
							<div class="flexi-item-in">
								<img src="img/f2.jpg">
								<p>Ingrandimento 3x, mostra ogni dettaglio</p>
							</div>
						</div>
						<div class="flexi-item">
							<div class="flexi-item-in">
								<img src="img/f3.jpg">
								<p>Grazie alla potente luce LED vedrai chiaramente la pelle, truccarti sarà facilissimo
								</p>
							</div>
						</div>
						<div class="flexi-item">
							<div class="flexi-item-in">
								<img src="img/f4.jpg">
								<p>In un normale specchio (senza luce), non vedresti chiaramente gli effetti del makeup
								</p>
							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="cb2-image cb-image doulbe">
				<div class="cb2-image-inside">
					<img typeof="foaf:Image" src="img/02.jpg" alt="">
					<img typeof="foaf:Image" src="img/122.jpg" alt="">
				</div>
			</div>

		</div>
	</section>


	<section class="block2 grayso">
		<div class="block2-inside">

			<div class="cb2-image cb-image">
				<div class="cb2-image-inside">
					<img typeof="foaf:Image" src="img/03.jpg" alt="">
				</div>
			</div>


			<div class="block2-1">
				<div class="block2-1-inside">
					<h2 class="title" title="Book your flights from anywhere">SPECCHIO MAKEUP PORTATILE a LUCE LED e
						POWER BANK per RICARICARE il tuo CELLULARE</h2>
					<p>Design eccellente.<br>Ricaricabile tramite USB.<br>
						Power bank di 3000mAh.<br>
						Alimenta qualsiasi smartphone tramite cavo USB.</p>
					<a href="#webform" class="bttn-6">Scopri l'offerta</a>
				</div>
			</div>

		</div>
	</section>


	<section class="block2 righto">
		<div class="block2-inside">


			<div class="block2-1">
				<div class="block2-1-inside">
					<h2 class="title" title="Book your flights from anywhere">CONTENUTO DELLA CONFEZIONE</h2>
					<h3 class="title" title="Book your flights from anywhere">OTTIMO ANCHE COME IDEA REGALO</h3>
					<div class="flexi-chara punto">
						<div class="flexi-item">
							<img src="img/p1.jpg">
							<p>scatola</p>
						</div>
						<!--<div class="flexi-item">
					<img src="images/p2.jpg" >
					<p>interno</p>
				</div>-->
						<div class="flexi-item">
							<img src="img/p3.jpg">
							<p>specchio</p>
						</div>
						<div class="flexi-item">
							<img src="img/p4.jpg">
							<p>istruzioni</p>
						</div>
						<div class="flexi-item">
							<img src="img/p5.jpg">
							<p>cavo USB</p>
						</div>
					</div>

				</div>
			</div>

			<div class="cb2-image cb-image">
				<div class="cb2-image-inside">
					<img typeof="foaf:Image" src="img/04.jpg" alt="">
				</div>
			</div>

		</div>
	</section>


	<section class="block2">
		<div class="block2-inside">

			<div class="cb2-image cb-image">
				<div class="cb2-image-inside">
					<img typeof="foaf:Image" src="img/05.jpg" alt="">
				</div>
			</div>


			<div class="block2-1">
				<div class="block2-1-inside">
					<h2 class="title" title="Book your flights from anywhere">Ricarica il tuo cellulare in ogni momento!
					</h2>
					<p>Con funzione di ricarica della batteria tramite cavo USB (adatto a qualsiasi smartphone)</p>
					<a href="#webform" class="bttn-6">Sblocca l'offerta adesso</a>
				</div>
			</div>

		</div>
	</section>



	<section class="block1 blacko videos centero">
		<div class="promo-ov"></div>
		<div class="block1-inside">

			<p class="title" style="color:#fff">Specchio con luce led e Power bank per ricaricare il tuo telefono</p>
			<div class="video-parent">
				<div class="video-responsive">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/RVW4Av1ZI14" frameborder="0"
						allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
						allowfullscreen></iframe>
				</div>
			</div>
			<a href="#webform" class="bttn-6">Ultimi prodotti disponibili</a>

		</div>
	</section>



	<section class="block3 recensione">
		<div class="block3-inside">

			<h2 class="title" title="Book your flights from anywhere">Recensioni</h2>

			<div class="block3-1">
				<div class="block3-1-inside">


					<div class="rec-item">
						<img src="img/per recensione1.jpg">
						<p>Da quando l’ho acquistato, lo porto sempre con me in borsa, è diventato il mio compagno
							indispensabile! Ogni donna lo dovrebbe avere… inoltre se ho il telefono scarico posso
							ricaricarlo attaccandolo con l’apposito cavo in dotazione! Ottimo acquisto!! grazie!!</p>
					</div>
					<div class="rec-item">
						<img src="img/per recensione2.jpg">
						<p>Ho acquistato questo specchio, nonostante io non sia solita truccarmi, o averne uno in borsa,
							ma devo ammettere che averlo è stata una sorpresa: è utilissimo per molteplici scopi, tra i
							quali la possibilità di caricare qualsiasi dispositivo elettronico tramite l’utilizzo della
							sua batteria e il cavo fornito. Acquisto consigliato!!</p>
					</div>
					<div class="rec-item">
						<img src="img/per recensione3.jpg">
						<p>Bello, comodo, compatto e di ottimo design!! Insomma fighissimo!!! Tutte le amiche me lo
							invidiano, e la luce è spettacolare: tra l’altro è regolabile la sua intensità, in base a
							quanta ne serve!! Per non parlare del fatto che, al bisogno, è un’ottima powerbank!!
							Consigliassimo!!</p>
					</div>



				</div>
			</div>


		</div>
	</section>


	<section class="block2 righto" id="webform">
		<div class="block2-inside">


			<div class="block2-1">
				<div class="block2-1-inside">

					<h2 class="title" title="Book your flights from anywhere"><br>
						<div class="container form-cont" style="max-width: 500px;">

							<form action="index.php"  method="post" role="form" >
								<center>
									<h3 class="title">COMPILA IL MODULO</h3>
								</center>
								<div class="form-group">
									<label class="form-label">Nome e Cognome</label>
									<input type="text" name="name" class="form-control"
									placeholder="Inserisci Nome e Cognome" required="required">
								</div>
								<div class="form-group">
									<label>Telefono (Meglio Cellulare)</label>
									<input type="text" name="phone" class="form-control"
									placeholder="Inserisci il tuo numero di telefono" required="required">
								</div>
								<div class="form-group">
									<label>Indirizzo e n. civico</label>
									<input type="text" name="other[address]" class="form-control"
									placeholder="ES. Via Aldo moro, 130" required="required">
								</div>
								<div class="form-row">
									<div class="form-group col-md-8">
										<label>Città</label>
										<input type="text" name="other[city]" class="form-control" placeholder="ES. Milano"
										required="required">
									</div>
									<div class="form-group col-md-4">
										<label>CAP</label>
										<input type="text" name="other[zipcode]" class="form-control" placeholder="ES. 94112"
										required="required">
									</div>
								</div>

								<div class="form-row offer-selection">
									<div class="col-auto text-center d-flex align-items-center">
										<img style="max-width:100%;max-height:80px;"
										src="img/2979_a0279760caee9825cc915227bfd3068f_1578492099.jpg">
									</div>
									<div class="form-group col text-center">
										<label>Scegli un'offerta</label>
										<select name="other[quantity]" class="form-control" required="required">
											<option value="1" selected="selected">1 Energy Mirror 69,90 €</option>
											<option value="2">2 Energy Mirror 89,90 €</option>
											<option value="3">3 Energy Mirror 99,90 €</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="text-center">
									<span style="color: black; padding: 4px; background: #ffc205; font-weight: bold; border-radius: 5px; font-size: 18px;">&nbsp;<i class="fa fa-truck"></i> La spedizione è gratis! </span>
									</div>
								</div>

								<div class="form-group">
									<label>Note per il corriere</label>
									<input type="text" name="other[notes]" class="form-control" rows="2"
									placeholder="ES. Citofonare al Sig. Rossi">
								</div>
								<div class="preloader loader-1"></div>
								<center>
									<div id="info-privacy"><small>Cliccando "Completa l'acquisto" confermi di aver preso
											visione <a href="policy.html" target="_blank">dell'informativa sulla privacy</a>.</small></div><button
										id="submit-button" class="btn btn-lg btn-warning new-sbm-btn"
										type="submit">Completa l'acquisto</button>
								</center>
							<input type="hidden" name="sub1" value="{subid}">
</form>
						</div>
					</h2>

				</div>
			</div>

			<div class="cb2-image cb-image">
				<div class="cb2-image-inside">
					<img typeof="foaf:Image" src="img/06.jpg" alt="">
				</div>
			</div>

		</div>
	</section>



	<footer id="footer" style="font-size: 18px; line-height: 20px; text-align: center;    auto    color: #000;auto.col-md-4, .col-md-8 {auto">
		<p>ST. GERARDE LTD, PO Box 832, Orion Mall, Palm Street, Victoria, Mahé, Seychelles</p> <a href="policy.html" target="_blank">Informativa sulla Privacy</a>
	</footer>
<script type="text/javascript" src="https://cdn.ldrock.com/validator.js"></script>
<script type="text/javascript">
    LeadrockValidator.init({
        geo: {
            iso_code: 'IT'
        }
    });
</script>
</body>

</html>
<?php

// ...


class Gazprices_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	// function __construct() {
	// 	parent::__construct(
	// 		'gazprices_widget', // Base ID
	// 		__( 'gazprices widget', 'Gazprices' ), // Name
	// 		array( 'description' => __( 'Show gazprices widget with React', 'Gazprices' ), ) // Args
	// 	);
	// }
	public function __construct() {
		$widget_ops = array('classname' => 'gazprices_widget_entries', 'description' => esc_html__( "Show gazprices widget with React", 'transcargo') );
		parent::__construct('gazprices_widget', esc_html__('Gazprices widget', 'transcargo'), $widget_ops);
		$this->alt_option_name = 'gazprices_widget_entries';
		$this->string_demo = "{\"cities\":[\"Agadir\",\"Agdz\",\"Agouim\",\"Aguelmouss\",\"AinAouda\",\"AinAttiq\",\"AinHarrouda\",\"AinJouhra\",\"AitBaha\",\"AitIazza\",\"AitMelloul\",\"AitOurir\",\"Ajdir\",\"AlHoceima\",\"Amskroud\",\"Attaouia\",\"Azemmour\",\"Azrou\",\"Bejaad\",\"Belfaa\",\"BenAhmed\",\"BenGuerir\",\"BenSlimane\",\"BeniHadifa\",\"BeniMellal\",\"BeniNsar\",\"Benslimane\",\"Berkane\",\"Berrechid\",\"Boufakrane\",\"Boujniba\",\"Boumalne\",\"Boumia\",\"Bouskoura\",\"Bouznika\",\"Casablanca\",\"Chefchaouen\",\"Chichaoua\",\"CrochetBlanco\",\"DjemaaSahim\",\"Dlalha\",\"DouarOuledGhadbane\",\"Driouch\",\"ElAioun\",\"ElHajeb\",\"ElJadida\",\"ElKalaaDEsraghna\",\"ElMenzel\",\"Erfoud\",\"Errachidia\",\"Essaouira\",\"Fès\",\"FkihBensalah\",\"Ghafsai\",\"Goulmime\",\"Guercif\",\"HadHrara\",\"HadSoualem\",\"Idelssane\",\"Ikaoune\",\"Immouzer\",\"Imzouren\",\"Inchaden\",\"Inzegane\",\"KaaSrass\",\"KalaaMegouna\",\"KasbaTadla\",\"Kenetra\",\"Kenitra\",\"Khemisset\",\"Khenifra\",\"Khouribga\",\"Kleaa\",\"KsarElKebir\",\"Ksiba\",\"Laaouamra\",\"Larache\",\"MachraaBelKsiri\",\"Marrakech\",\"Martil\",\"Mediouna\",\"Meknès\",\"Meloussa\",\"Midelt\",\"Missour\",\"Mjaara\",\"Mohammedia\",\"MontElAroui\",\"Mrirt\",\"Mzouda\",\"Nador\",\"Nouasseur\",\"Oualidia\",\"Ouarzazate\",\"Ouazzane\",\"OuedAmlil\",\"OuedZem\",\"Oujda\",\"OuledJelloul\",\"OuledMbarek\",\"OuledTaima\",\"Rabat\",\"Rich\",\"Safi\",\"Saidia\",\"SalaAlJadida\",\"Sale\",\"SebtGzoula\",\"Sefrou\",\"Settat\",\"SidiAllalBahraoui\",\"SidiAssal\",\"SidiAyache\",\"SidiBennour\",\"SidiBibi\",\"SidiKacem\",\"SidiSlimane\",\"SidiSmail\",\"SidiTiji\",\"SidiZouine\",\"SoukElArbaa\",\"SoukLarbaa\",\"Tamansourt\",\"Tamelalt\",\"Tamsamane\",\"Tanant\",\"Tanger\",\"Taourirt\",\"Targuist\",\"Taroudant\",\"Tata\",\"Taza\",\"Taznakht\",\"Temara\",\"Tetouan\",\"Tikiouine\",\"Tinghir\",\"Tinjdad\",\"Tinzouline\",\"Tiznit\",\"TletLouled\",\"TnineGhiat\",\"TnineOurika\",\"Youssoufia\",\"Zagora\",\"Zaio\",\"Zemamra\"],\"default_city\":\"0\",\"proxy\":\"https://thingproxy.freeboard.io/fetch/\",\"api\":{\"base\":\"https://total.smarteez.eu\",\"stations_path\":\"/submit/?ville=\",\"prices_path\":\"/submit/?station=\"}}";
		$this->default_data = array (
    'cities' => 
    array (
      0 => 'Agadir',
      1 => 'Agdz',
      2 => 'Agouim',
      3 => 'Aguelmouss',
      4 => 'Ain Aouda',
      5 => 'Ain Attiq',
      6 => 'Ain Harrouda',
      7 => 'Ain Jouhra',
      8 => 'Ait Baha',
      9 => 'Ait Iazza',
      10 => 'Ait Melloul',
      11 => 'Ait Ourir',
      12 => 'Ajdir',
      13 => 'Al Hoceima',
      14 => 'Amskroud',
      15 => 'Attaouia',
      16 => 'Azemmour',
      17 => 'Azrou',
      18 => 'Bejaad',
      19 => 'Belfaa',
      20 => 'Ben Ahmed',
      21 => 'Ben Guerir',
      22 => 'Ben Slimane',
      23 => 'Beni Hadifa',
      24 => 'Beni Mellal',
      25 => 'Beni Nsar',
      26 => 'Benslimane',
      27 => 'Berkane',
      28 => 'Berrechid',
      29 => 'Boufakrane',
      30 => 'Boujniba',
      31 => 'Boumalne',
      32 => 'Boumia',
      33 => 'Bouskoura',
      34 => 'Bouznika',
      35 => 'Casablanca',
      36 => 'Chefchaouen',
      37 => 'Chichaoua',
      38 => 'Crochet Blanco',
      39 => 'Djemaa Sahim',
      40 => 'Dlalha',
      41 => 'Douar Ouled Ghadbane',
      42 => 'Driouch',
      43 => 'El Aioun',
      44 => 'El Hajeb',
      45 => 'El Jadida',
      46 => 'El Kalaa D Esraghna',
      47 => 'El Menzel',
      48 => 'Erfoud',
      49 => 'Errachidia',
      50 => 'Essaouira',
      51 => 'Fès',
      52 => 'Fkih Bensalah',
      53 => 'Ghafsai',
      54 => 'Goulmime',
      55 => 'Guercif',
      56 => 'Had Hrara',
      57 => 'Had Soualem',
      58 => 'Idelssane',
      59 => 'Ikaoune',
      60 => 'Immouzer',
      61 => 'Imzouren',
      62 => 'Inchaden',
      63 => 'Inzegane',
      64 => 'Kaa Srass',
      65 => 'Kalaa Megouna',
      66 => 'Kasba Tadla',
      67 => 'Kenetra',
      68 => 'Kenitra',
      69 => 'Khemisset',
      70 => 'Khenifra',
      71 => 'Khouribga',
      72 => 'Kleaa',
      73 => 'Ksar El Kebir',
      74 => 'Ksiba',
      75 => 'Laaouamra',
      76 => 'Larache',
      77 => 'Machraa Bel Ksiri',
      78 => 'Marrakech',
      79 => 'Martil',
      80 => 'Mediouna',
      81 => 'Meknès',
      82 => 'Meloussa',
      83 => 'Midelt',
      84 => 'Missour',
      85 => 'Mjaara',
      86 => 'Mohammedia',
      87 => 'Mont El Aroui',
      88 => 'Mrirt',
      89 => 'Mzouda',
      90 => 'Nador',
      91 => 'Nouasseur',
      92 => 'Oualidia',
      93 => 'Ouarzazate',
      94 => 'Ouazzane',
      95 => 'Oued Amlil',
      96 => 'Oued Zem',
      97 => 'Oujda',
      98 => 'Ouled Jelloul',
      99 => 'Ouled Mbarek',
      100 => 'Ouled Taima',
      101 => 'Rabat',
      102 => 'Rich',
      103 => 'Safi',
      104 => 'Saidia',
      105 => 'Sala Al Jadida',
      106 => 'Sale',
      107 => 'Sebt Gzoula',
      108 => 'Sefrou',
      109 => 'Settat',
      110 => 'Sidi Allal Bahraoui',
      111 => 'Sidi Assal',
      112 => 'Sidi Ayache',
      113 => 'Sidi Bennour',
      114 => 'Sidi Bibi',
      115 => 'Sidi Kacem',
      116 => 'Sidi Slimane',
      117 => 'Sidi Smail',
      118 => 'Sidi Tiji',
      119 => 'Sidi Zouine',
      120 => 'Souk El Arbaa',
      121 => 'Souk Larbaa',
      122 => 'Tamansourt',
      123 => 'Tamelalt',
      124 => 'Tamsamane',
      125 => 'Tanant',
      126 => 'Tanger',
      127 => 'Taourirt',
      128 => 'Targuist',
      129 => 'Taroudant',
      130 => 'Tata',
      131 => 'Taza',
      132 => 'Taznakht',
      133 => 'Temara',
      134 => 'Tetouan',
      135 => 'Tikiouine',
      136 => 'Tinghir',
      137 => 'Tinjdad',
      138 => 'Tinzouline',
      139 => 'Tiznit',
      140 => 'Tlet Louled',
      141 => 'Tnine Ghiat',
      142 => 'Tnine Ourika',
      143 => 'Youssoufia',
      144 => 'Zagora',
      145 => 'Zaio',
      146 => 'Zemamra',
    ),
    'default_city' => '0',
    'proxy' => 'https://thingproxy.freeboard.io/fetch/',
    'api' => 
    array (
      'base' => 'https://total.smarteez.eu',
      'stations_path' => '/submit/?ville=',
      'prices_path' => '/submit/?station=',
    ),
);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
	 
// 	 		$data = json_encode($this->default_data);
// 				$pos = strpos($data,'"');
// 				if ($pos !== false) {
// 			    $data_str = substr($data,0,$pos+1) . str_replace('"','\\"',substr($data,$pos+1));
// 				}
			?>
          <div id="gazprices" config="<?php echo htmlspecialchars(json_encode($this->default_data), ENT_QUOTES, 'UTF-8'); ?>"></div>
         <?php
	 
		
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

}  
function register_recent_widget() {
	register_widget( 'Gazprices_Widget' );
}
add_action( 'widgets_init', 'register_recent_widget' );
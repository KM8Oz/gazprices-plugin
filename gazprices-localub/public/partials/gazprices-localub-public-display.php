<?php

// ...

class Gazprices_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'gazprices_widget', // Base ID
			__( 'gazprices widget', 'Gazprices' ), // Name
			array( 'description' => __( 'Show gazprices widget with React', 'Gazprices' ), ) // Args
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
	 
	 
			echo '<div id="gazprices" config='"{\"cities\":[\"Agadir\",\"Agdz\",\"Agouim\",\"Aguelmouss\",\"Ain Aouda\",\"Ain Attiq\",\"Ain Harrouda\",\"Ain Jouhra\",\"Ait Baha\",\"Ait Iazza\",\"Ait Melloul\",\"Ait Ourir\",\"Ajdir\",\"Al Hoceima\",\"Amskroud\",\"Attaouia\",\"Azemmour\",\"Azrou\",\"Bejaad\",\"Belfaa\",\"Ben Ahmed\",\"Ben Guerir\",\"Ben Slimane\",\"Beni Hadifa\",\"Beni Mellal\",\"Beni Nsar\",\"Benslimane\",\"Berkane\",\"Berrechid\",\"Boufakrane\",\"Boujniba\",\"Boumalne\",\"Boumia\",\"Bouskoura\",\"Bouznika\",\"Casablanca\",\"Chefchaouen\",\"Chichaoua\",\"Crochet Blanco\",\"Djemaa Sahim\",\"Dlalha\",\"Douar Ouled Ghadbane\",\"Driouch\",\"El Aioun\",\"El Hajeb\",\"El Jadida\",\"El Kalaa D Esraghna\",\"El Menzel\",\"Erfoud\",\"Errachidia\",\"Essaouira\",\"Fès\",\"Fkih Bensalah\",\"Ghafsai\",\"Goulmime\",\"Guercif\",\"Had Hrara\",\"Had Soualem\",\"Idelssane\",\"Ikaoune\",\"Immouzer\",\"Imzouren\",\"Inchaden\",\"Inzegane\",\"Kaa Srass\",\"Kalaa Megouna\",\"Kasba Tadla\",\"Kenetra\",\"Kenitra\",\"Khemisset\",\"Khenifra\",\"Khouribga\",\"Kleaa\",\"Ksar El Kebir\",\"Ksiba\",\"Laaouamra\",\"Larache\",\"Machraa Bel Ksiri\",\"Marrakech\",\"Martil\",\"Mediouna\",\"Meknès\",\"Meloussa\",\"Midelt\",\"Missour\",\"Mjaara\",\"Mohammedia\",\"Mont El Aroui\",\"Mrirt\",\"Mzouda\",\"Nador\",\"Nouasseur\",\"Oualidia\",\"Ouarzazate\",\"Ouazzane\",\"Oued Amlil\",\"Oued Zem\",\"Oujda\",\"Ouled Jelloul\",\"Ouled Mbarek\",\"Ouled Taima\",\"Rabat\",\"Rich\",\"Safi\",\"Saidia\",\"Sala Al Jadida\",\"Sale\",\"Sebt Gzoula\",\"Sefrou\",\"Settat\",\"Sidi Allal Bahraoui\",\"Sidi Assal\",\"Sidi Ayache\",\"Sidi Bennour\",\"Sidi Bibi\",\"Sidi Kacem\",\"Sidi Slimane\",\"Sidi Smail\",\"Sidi Tiji\",\"Sidi Zouine\",\"Souk El Arbaa\",\"Souk Larbaa\",\"Tamansourt\",\"Tamelalt\",\"Tamsamane\",\"Tanant\",\"Tanger\",\"Taourirt\",\"Targuist\",\"Taroudant\",\"Tata\",\"Taza\",\"Taznakht\",\"Temara\",\"Tetouan\",\"Tikiouine\",\"Tinghir\",\"Tinjdad\",\"Tinzouline\",\"Tiznit\",\"Tlet Louled\",\"Tnine Ghiat\",\"Tnine Ourika\",\"Youssoufia\",\"Zagora\",\"Zaio\",\"Zemamra\"],\"default_city\":\"0\",\"proxy\":\"https://thingproxy.freeboard.io/fetch/\",\"api\":{\"base\":\"https://total.smarteez.eu\",\"stations_path\":\"/submit/?ville=\",\"prices_path\":\"/submit/?station=\"}}"'></div>';
	 
		
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
function register_Gazprices_widget() {
    register_widget( 'Gazprices_Widget' );
}
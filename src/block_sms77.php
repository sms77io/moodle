<?php

class block_sms77 extends block_base {
    /**
     * @return void
     * @throws coding_exception
     */
    public function init() {
        $this->title = 'Sms77';
    }

    /**
     * @param string $viewpage
     * @param string $identifier
     * @return string
     * @throws coding_exception
     * @throws moodle_exception
     */
    private function create_content_link($viewpage, $identifier) {
        return html_writer::link(
                new moodle_url('/blocks/sms77/view.php', ['viewpage' => $viewpage]),
                get_string($identifier, 'block_sms77')) . '<br>';
    }

    /**
     * @return stdClass|stdObject|null
     * @throws coding_exception
     * @throws moodle_exception
     */
    public function get_content() {
        if (!$this->content) {
            $this->content = new stdClass;
            $this->content->text = $this->create_content_link('1', 'voice_send')
                . $this->create_content_link('2', 'sms_send')
                . $this->create_content_link('3', 'msg_template');

            //$this->page->requires->js();
        }

        $this->page->requires->js_init_code('window.alert("HI2U!")');
        $this->page->requires->js_init_call('M.block_sms77.init');

        return $this->content;
    }

    /** @return bool */
    public function has_config() {
        return true;
    }

    /** @return array|bool[] */
    public function applicable_formats() {
        return ['all' => true];
    }

    /** @return bool */
    public function instance_allow_config() {
        return true;
    }
}

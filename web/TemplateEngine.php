<?php

class TemplateEngine {
    protected $templateDir;

    public function __construct($templateDir) {
        $this->templateDir = rtrim($templateDir, '/') . '/';
    }
    public function render($templateFile, $data = []) {

        $templatePath = $this->templateDir . $templateFile . '.php';
        if (!file_exists($templatePath)) {
            die("Template dosyası bulunamadı: $templateFile");
        }


        $template = file_get_contents($templatePath);

        $template = preg_replace('/\{([a-zA-Z_][a-zA-Z0-9_]*)\}/', '<?php echo $$1; ?>', $template);

        $template = preg_replace('/@if\((.*?)\)/', '<?php if($1): ?>', $template);
        $template = str_replace('@else', '<?php else: ?>', $template);
        $template = str_replace('@endif', '<?php endif; ?>', $template);

        $template = preg_replace('/@foreach\((.*?)\)/', '<?php foreach($1): ?>', $template);
        $template = str_replace('@endforeach', '<?php endforeach; ?>', $template);

        $template = str_replace('@csrf', '<input type="hidden" id="csrf_token" class="csrf_token" value="<?php if(isset($_SESSION["csrf_token"])){ echo $_SESSION["csrf_token"];}else{$_SESSION["csrf_token"]=md5(uniqid());}?>">', $template);

        $compiledFile = tempnam(sys_get_temp_dir(), 'tpl_') . '.php';
        file_put_contents($compiledFile, $template);


        extract($data);


        ob_start();
        include $compiledFile;
        $output = ob_get_clean();

        unlink($compiledFile);

        return $output;
    }
}
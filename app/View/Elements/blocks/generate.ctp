<div class="row generate_pass">
    <div class="large12 columns">
        <a class="pb-btn" href="javascript:void(0);"
           data-href="/pass/generate_pass/<?= $this->data['Pass']['id'] ?>"
           id="generateBtn">Generate Pass</a>

        <div id="window">
            <?=$this->Form->create(null, array('method' => 'get', 'id' => 'PassGenerateForm', 'url' => '/Pass/generate_pass/' . $this->data['Pass']['id']));?>
            <?=$this->Form->input('email', array('name' => 'data[email]', 'label' => false, 'placeholder' => 'Email to send')); ?>
            <p class="error"></p>
            <?=$this->Form->end(array('label' => 'Generate', 'class' => 'k-button'));?>
        </div>
    </div>
</div>


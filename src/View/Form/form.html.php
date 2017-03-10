<?php $this->layout('view::Layout/layout.html.php') ?>

<?php $this->start('assets');
echo asset('view::Form/form.css');
$this->stop(); ?>

<form class="form-horizontal" method="POST" role="form" enctype="multipart/form-data">
    <?php if (!empty($this->value('errors.main'))) : ?>
        <div class="form-group">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <div class="alert alert-danger" role="alert">
                    <span class="help-block"><?php $this->wh('errors.main'); ?></span>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php foreach ($this->next('flash') as $type => $messages) : ?>
        <?php foreach ($messages as $message) : ?>
            <div class="form-group">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <div class="alert alert-<?= $this->e($type); ?>" role="alert">
                        <span class="help-block"><?= $this->e($message); ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endforeach; ?>
    <div class="form-group">
        <label for="name" class="col-md-2 control-label"><?= $this->e(__("Name")) ?>*</label>
        <div class="col-sm-4">
            <input type="text" name="name" class="form-control" id="name"
                   placeholder="<?= $this->e(__("Name")) ?>"
                   value="<?php $this->wh('data.name'); ?>" required>
            <?php if (!empty($this->value('errors.name'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <span class="help-block"><?php $this->wh('errors.name'); ?></span>
                </div>
            <?php endif; ?>
        </div>
        <label for="vorname" class="col-sm-1 control-label"><?= $this->e(__("Vorname")) ?>*</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="vorname" id="vorname"
                   placeholder="<?= $this->e(__("Vorname")) ?>"
                   value="<?php $this->wh('data.vorname'); ?>" required>
            <?php if (!empty($this->value('errors.vorname'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <span class="help-block"><?php $this->wh('errors.vorname'); ?></span>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group">
        <label for="strasse" class="col-sm-2 control-label"><?= $this->e(__("Strasse")) ?></label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="strasse" id="strasse" pattern=".{3,}" maxlength="50"
                   placeholder="<?= $this->e(__("Strasse")) ?>" value="<?php $this->wh('data.strasse'); ?>">
        </div>
        <label for="nr" class="col-sm-1 control-label"><?= $this->e(__("Nr.")) ?></label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="nr" id="nr" max="99999"
                   placeholder="<?= $this->e(__("Hausnummer")) ?>"
                   value="<?php $this->wh('data.nr'); ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="plz" class="col-sm-2 control-label"><?= $this->e(__("PLZ")) ?></label>
        <div class="col-sm-4">
            <input type="number" class="form-control" id="plz" name="plz"
                   placeholder="<?= $this->e(__("PLZ")) ?>"
                   value="<?php $this->wh('data.plz'); ?>">
            <?php if (!empty($this->value('errors.plz'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <span class="help-block"><?php $this->wh('errors.plz'); ?></span>
                </div>
            <?php endif; ?>
        </div>
        <label for="ort" class="col-sm-1 control-label"><?= $this->e(__("Ort")) ?></label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="ort" name="ort" pattern=".{3,}" maxlength="20"
                   placeholder="<?= $this->e(__("Ort")) ?>" value="<?php $this->wh('data.ort'); ?>">
            <?php if (!empty($this->value('errors.ort'))) {
                $this->wh('errors.ort');
            } ?>
        </div>
    </div>
    <div class="form-group">
        <label for="land" class="col-sm-2 control-label"><?= $this->e(__("Land")) ?></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="land" name="land" pattern=".{1,}" maxlength="20"
                   placeholder="<?= $this->e(__("Land")) ?>" value="<?php $this->wh('data.land'); ?>">
            <?php if (!empty($this->value('errors.land'))) {
                $this->wh('errors.land');
            } ?>
        </div>
    </div>
    <div class="form-group">
        <label for="handy" class="col-sm-2 control-label"><?= $this->e(__("Handy")) ?></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="handy" name="handy" minlength="10" maxlength="20"
                   placeholder="<?= $this->e(__("Handy Nummer")) ?>" value="<?php $this->wh('data.handy'); ?>">
            <?php if (!empty($this->value('errors.handy'))) {
                $this->wh('errors.handy');
            } ?>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label"><?= $this->e(__("Email")) ?>*</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" pattern=".{5,50}"
                   placeholder="<?= $this->e(__("Email")) ?>" required
                   value="<?php $this->wh('data.email'); ?>">
            <?php if (!empty($this->value('errors.email'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <span class="help-block"><?php $this->wh('errors.email'); ?></span>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group">
        <label for="comment" class="col-md-2 control-label"><?= $this->e(__("Nachricht")) ?>*</label>
        <div class="col-md-10">
                    <textarea class="form-control" rows="5" id="comment" name="comment"
                              placeholder="<?= $this->e(__("Nachricht")) ?>"
                              required><?php $this->wh('data.comment'); ?></textarea>
            <?php if (!empty($this->value('errors.comment'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <span class="help-block"><?php $this->wh('errors.comment'); ?></span>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <br>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="newsletter" name="newsletter"
                           value="newsletter" <?php echo ($this->value('data.newsletter')) ?
                        "checked='checked'" : '' ?> >
                    <?= $this->e(__("Newsletter")) ?>
                </label>
            </div>
        </div>
    </div>
    <br>
    <div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div>
                    <p style="font-size: medium"><?= $this->e(__("Möchten sie telefonisch kontaktiert werden?")) ?></p>
                    <div class="radio">
                        <label><input type="radio" name="optradio"
                                      value="ja" <?php echo ($this->value('data.optradio') == "ja") ?
                                'checked="checked"' : ''
                            ?> ><?= $this->e(__("Ja")) ?></label>
                        <label><input type="radio" name="optradio"
                                      value="nein" <?php echo ($this->value('data.optradio') == "nein") ?
                                'checked="checked"' : ''
                            ?> ><?= $this->e(__("Nein")) ?></label>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="form-group">
            <label for="comment"
                   class="col-md-2 control-label"><?= $this->e(__("Wann sollen wir Sie kontaktieren?")) ?></label>
            <div class="col-lg-7">
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox1" name="option1"
                           value="option1" <?php echo ($this->value('data.option1')) ?
                        "checked='checked'" : ''
                    ?>> <?= $this->e(__("Montag")) ?>
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox2" name="option2"
                           value="option2" <?php echo ($this->value('data.option2')) ?
                        "checked='checked'" : ''
                    ?>> <?= $this->e(__("Dienstag")) ?>
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox3" name="option3"
                           value="option3" <?php echo ($this->value('data.option3')) ?
                        "checked='checked'" : ''
                    ?>> <?= $this->e(__("Mittwoch")) ?>
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox4" name="option4"
                           value="option4" <?php echo ($this->value('data.option4')) ?
                        "checked='checked'" : ''
                    ?>> <?= $this->e(__("Donnerstag")) ?>
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox5" name="option5"
                           value="option5" <?php echo ($this->value('data.option5')) ?
                        "checked='checked'" : ''
                    ?>> <?= $this->e(__("Freitag")) ?>
                </label>
            </div>
            <div class="col-lg-3"></div>
            <div class="col-lg-2"></div>
            <div class="col-lg-7">
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox6" name="option6"
                           value="option6" <?php echo ($this->value('data.option6')) ?
                        "checked='checked'" : ''
                    ?>> <?= $this->e(__("9:00 -
                            12:00 Uhr")) ?>
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox7" name="option7"
                           value="option7" <?php echo ($this->value('data.option7')) ?
                        "checked='checked'" : ''
                    ?>> <?= $this->e(__("13:00 -
                            17:00 Uhr")) ?>
                </label>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <?php if (!empty($this->value('errors.checkbox'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <span class="help-block"><?php $this->wh('errors.checkbox'); ?></span>
                </div>
            <?php endif; ?>
            <?php if (!empty($this->value('errors.checkbox2'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <span class="help-block"><?php $this->wh('errors.checkbox2'); ?></span>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4">
            <label class="btn btn-primary btn-file">
                <input type="file" name="fileToUpload" id="fileToUpload" value="">
            </label>
            <?php if (!empty($this->value('errors.fileToUploadMain'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <span class="help-block"><?php $this->wh('errors.fileToUploadMain'); ?></span>
                </div>
            <?php endif; ?>
            <?php if (!empty($this->value('errors.fileToUpload'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <span class="help-block"><?php $this->wh('errors.fileToUpload'); ?></span>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <button type="submit" name="send" class="btn btn-success send-btn">Senden</button>
</form>
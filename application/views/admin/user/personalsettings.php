<div class='header'>
    <?php eT("Your personal settings"); ?>
</div>
<br />
<div>
    <?php echo CHtml::form($this->createUrl("/admin/user/sa/personalsettings"), 'post', array('class' => 'form44')); ?>
        <ul>
            <li>
                <?php 
                echo CHtml::label(gT("Interface language"), 'lang');
                $options = CHtml::listData(\ls\helpers\SurveyTranslator::getLanguageData(true, App()->language), 'code', function($model) {
                    return html_entity_decode($model['nativedescription']);
                });
                echo TbHtml::dropDownList('lang', App()->user->model->getLanguage(), $options, ['id' => 'lang']);
                ?>
            </li>

            <li>
                <?php echo CHtml::label(gT("HTML editor mode"), 'htmleditormode'); ?>:
                <?php
                echo CHtml::dropDownList('htmleditormode', Yii::app()->session['htmleditormode'], array(
                    'default' => gT("Default"),
                    'inline' => gT("Inline HTML editor"),
                    'popup' => gT("Popup HTML editor"),
                    'none' => gT("No HTML editor")
                ));
                ?>
            </li>

            <li>
                <?php echo CHtml::label(gT("Question type selector"), 'questionselectormode'); ?>:
                <?php
                echo CHtml::dropDownList('questionselectormode', Yii::app()->session['questionselectormode'], array(
                    'default' => gT("Default"),
                    'full' => gT("Full selector"),
                    'none' => gT("Simple selector")
                ));
                ?>
            </li>

            <li>
                <?php echo CHtml::label(gT("Template editor mode"), 'templateeditormode'); ?>:
                <?php
                echo CHtml::dropDownList('templateeditormode', Yii::app()->session['templateeditormode'], array(
                    'default' => gT("Default"),
                    'full' => gT("Full template editor"),
                    'none' => gT("Simple template editor")
                ));
                ?>
            </li>

            <li>
                <?php echo CHtml::label(gT("Date format"), 'dateformat'); ?>:
                <select name='dateformat' id='dateformat'>
                <?php
                foreach (\ls\helpers\SurveyTranslator::getDateFormatData(0,Yii::app()->session['adminlang']) as $index => $dateformatdata)
                {
                    echo "<option value='{$index}'";
                    if ($index == Yii::app()->session['dateformat'])
                    {
                        echo " selected='selected'";
                    }

                    echo ">" . $dateformatdata['dateformat'] . '</option>';
                }
                ?>
                </select>
            </li>
        </ul>
        <p>
            <?php echo CHtml::hiddenField('action', 'savepersonalsettings'); ?>
            <?php echo CHtml::submitButton(gT("Save settings")); ?>
        </p>
    <?php echo CHtml::endForm(); ?>
</div>

<?
/**
 * View Template
 *
 * @author Daniel, Captiliity
 */
?>

<table class="fc-header cp-week-header">
    <tbody>
    <tr>
        <td class="fc-header-left"><span class="fc-header-title">
                <!--h2>03. – 07. Februar 2014</h2-->
                <h2>
                    <? $month1 = ($this->Captility->calcDate($week_start, '%m') == $this->Captility->calcDate($week_end, '%m')) ? '' : $this->Captility->calcDate($week_start, ' %B') ?>
                    <? $year1 = ($this->Captility->calcDate($week_start, '%Y') == $this->Captility->calcDate($week_end, '%Y')) ? '' : $this->Captility->calcDate($week_start, ' %Y') ?>
                    <? $start = $this->Captility->calcDate($week_start, '%d.') ?>
                    <? echo $start.$month1.$year1.' – ' ?>
                    <? echo $this->Captility->calcDate($week_end, '%d. %B %Y') ?>
                </h2>
            </span></td>
        <td class="fc-header-center"></td>
        <td class="fc-header-right">
            <span
                class="fc-button cp-button-week cp-button-week-prev fc-state-default fc-corner-left"
                unselectable="on"><span class="fc-text-arrow">‹</span></span><span
                class="fc-button cp-button-week cp-button-week-today fc-state-default" unselectable="on">Heute</span><span
                class="fc-button cp-button-week cp-button-week-next fc-state-default fc-corner-right"
                unselectable="on"><span class="fc-text-arrow">›</span>
            </span>
        </td>
    </tr>
    </tbody>
</table>
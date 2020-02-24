<div class="pagination">
    <?php if($this->task['prev_page']): ?>
        <a href="<?=base_url.'?offset='.$this->task['prev_page'].($this->task['orderby']? '&orderby='.$this->task['orderby'] : '' )?>">&laquo;</a>
    <?php endif; ?>
    <?php for($i = 1; $i <= $this->task['total_pages']; $i++ ): ?>
        <a href="<?=base_url.'?offset='.$i.($this->task['orderby']? '&orderby='.$this->task['orderby'] : '' )?>"
           class="<?=$this->task['current_page'] == $i ? 'activ-page': '' ?>"
        >
            <?=$i?>
        </a>
    <?php endfor; ?>
    <?php if($this->task['next_page']): ?>
        <a href="<?=base_url.'?offset='.$this->task['next_page'].($this->task['orderby']? '&orderby='.$this->task['orderby'] : '' )?>">&raquo;</a>
    <?php endif; ?>
</div>
<div class="ui card" v-if="students[0]" v-cloak>
    <div class="image">
        <img :src="'<?php echo URL::asset('imgs/students') ?>/' + students[<?php echo $id ?>].uid + '.jpg'" :alt="students[<?php echo $id ?>].name" class="img-thumbnail"/>
    </div>
    <div class="content">
        <a class="header">{{ students[<?php echo $id ?>].name }}</a>
        <div class="description">{{ students[<?php echo $id ?>].promotion }}</div>
    </div>
    <div class="content">
        <span class="right floated">
            <a :href="'https://facebook.com/' + students[<?php echo $id ?>].fbId" target="_blank"><i class="facebook square icon"></i></a>
        </span>
        <i :class="(students[<?php echo $id ?>].sex == 'M' ? 'man' : 'woman') + ' icon'"></i> {{ students[<?php echo $id ?>].sex == 'M' ? 'Homme' : 'Femme' }}
    </div>
    <div class="extra content">
        <button @click="vote({{ $id }})" type="button" class="ui button primary fluid">VOTER</button>
    </div>
</div>

<?php
namespace App\Model\Table;

use App\Model\Entity\Option;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Options Model
 */
class OptionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('options');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->belongsTo('Questions', [
            'foreignKey' => 'question_id'
        ]);
        $this->hasMany('Relations', [
            'foreignKey' => 'option_id'
        ]);
        $this->hasMany('WorkingHours', [
            'foreignKey' => 'option_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    { 
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->requirePresence('name', 'create')
            ->notEmpty('name')
			->allowEmpty('title')
			->allowEmpty('option_div')
			->allowEmpty('question_div')
            ->requirePresence('icon', 'create')
            ->allowEmpty('icon')
			->allowEmpty('image')
            ->add('is_chargeable', 'valid', ['rule' => 'boolean'])
            ->requirePresence('is_chargeable', 'create')
            ->notEmpty('is_chargeable')
			->allowEmpty('is_comment')
			->allowEmpty('comment')
			->allowEmpty('style');
			 

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['question_id'], 'Questions'));
        return $rules;
    }
}

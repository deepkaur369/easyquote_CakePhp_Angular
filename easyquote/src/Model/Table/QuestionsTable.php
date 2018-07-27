<?php
namespace App\Model\Table;

use App\Model\Entity\Question;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Questions Model
 */
class QuestionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('questions');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Services', [
            'foreignKey' => 'service_id'
        ]);
        $this->hasMany('Options', [
            'foreignKey' => 'question_id'
        ]);
         $this->hasMany('Relations', [
            'foreignKey' => 'question_id'
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
            ->requirePresence('question', 'create')
            ->notEmpty('question')
            ->add('is_multiple_choice', 'valid', ['rule' => 'boolean'])
            ->requirePresence('is_multiple_choice', 'create')
			->allowEmpty('is_first')
            ->notEmpty('is_multiple_choice');

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
        $rules->add($rules->existsIn(['service_id'], 'Services'));
        return $rules;
    }
}

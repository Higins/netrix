<?php
namespace Model;

use config\Setting\Setting;

class ActiveCollabModel {

	private $setting;
	public function __construct() {
		$this->setting = new Setting();
	}

	public function getTaskListByAsc(): array {
		$task = $this->setting->client->get($this->setting->env['PROJECT']);
		$parsed_json = $task->getJson();
		$taskData = [];
		if (!empty($parsed_json['tasks'])) {
			foreach ($parsed_json['tasks'] as $task) {
				$taskData[$task['id']]['name'] = $task['name'];
				$taskData[$task['id']]['body'] = $task['body'];
				$taskData[$task['id']]['updated_on'] = date('Y-m-d H:i:s', $task['updated_on']);
			}
		}
		array_multisort(array_map('strtotime',array_column($taskData,'updated_on')), SORT_ASC, $taskData);
		return $taskData;
	}
}

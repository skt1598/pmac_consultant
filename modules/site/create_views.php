<?php
// Create view for user interests all
$query1 = "CREATE VIEW user_interests_all  AS SELECT user_interests.*, users.fullname as user_name, interests.name as interest_name, skills.name as skill_level_name
FROM user_interests
LEFT JOIN users ON user_interests.user_id = users.user_id
LEFT JOIN interests ON user_interests.interest_id = interests.id
LEFT JOIN skills ON user_interests.skill_level_id = skills.id
WHERE user_interests.status = '1'";

//Create view for events
$query2 = "CREATE VIEW events_all  AS SELECT events.*, users.fullname as user_name, interests.name as interest_name, skills.name as skill_level_name
FROM events
LEFT JOIN users ON events.user_id = users.user_id
LEFT JOIN interests ON events.interest_id = interests.id
LEFT JOIN skills ON events.skill_level_id = skills.id
WHERE events.status = '1'";
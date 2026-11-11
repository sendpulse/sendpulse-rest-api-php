<?php

declare(strict_types=1);

/**
 * Operation map fragment for "edu" — GENERATED, do not edit by hand.
 * Regenerate with the sdk-generator. 73 operations.
 *
 * @return array<string, array{method: string, path: string, params: array<string, string>}>
 */

return [
    'edu.certificateSections.createCertificateSection' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/{schoolId}/{courseId}/certificate-section',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!'],
    ],
    'edu.certificateSections.deleteCertificateSection' => [
        'method' => 'DELETE',
        'path'   => '/edu/public/v1/{schoolId}/{courseId}/certificate-section/{certificateSectionId}',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'certificateSectionId' => 'int!'],
    ],
    'edu.certificateSections.updateCertificateSection' => [
        'method' => 'PUT',
        'path'   => '/edu/public/v1/{schoolId}/{courseId}/certificate-section',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!'],
    ],
    'edu.courseTariffs.createCourseTariff' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/tariffs',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!'],
    ],
    'edu.courseTariffs.createPaymentMethod' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/tariffs/{courseTariffId}/payment-method',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'courseTariffId' => 'int!'],
    ],
    'edu.courseTariffs.createTariffRenewal' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/tariffs/{courseTariffId}/tariff-renewal',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'courseTariffId' => 'int!'],
    ],
    'edu.courseTariffs.deleteCourseTariff' => [
        'method' => 'DELETE',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/tariffs/{courseTariffId}',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'courseTariffId' => 'int!'],
    ],
    'edu.courseTariffs.deletePaymentMethod' => [
        'method' => 'DELETE',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/tariffs/{courseTariffId}/payment-method/{paymentId}',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'courseTariffId' => 'int!', 'paymentId' => 'int!'],
    ],
    'edu.courseTariffs.deleteTariffAdvertisingText' => [
        'method' => 'DELETE',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/tariffs/{courseTariffId}/advertising-text',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'courseTariffId' => 'int!'],
    ],
    'edu.courseTariffs.deleteTariffRenewal' => [
        'method' => 'DELETE',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/tariffs/{courseTariffId}/tariff-renewal/{id}',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'courseTariffId' => 'int!', 'id' => 'int!'],
    ],
    'edu.courseTariffs.duplicateCourseTariff' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/tariffs/{courseTariffId}/duplicate',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'courseTariffId' => 'int!'],
    ],
    'edu.courseTariffs.listCourseTariffs' => [
        'method' => 'GET',
        'path'   => '/edu/public/v1/courses/{courseId}/tariffs',
        'params' => ['courseId' => 'int!', 'ids[]' => 'array', 'excludeIds[]' => 'array', 'status' => 'int'],
    ],
    'edu.courseTariffs.reorderCourseTariffs' => [
        'method' => 'PUT',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/tariffs/order',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!'],
    ],
    'edu.courseTariffs.updateCourseTariff' => [
        'method' => 'PUT',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/tariffs/{courseTariffId}',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'courseTariffId' => 'int!'],
    ],
    'edu.courseTariffs.updateCourseTariffSettings' => [
        'method' => 'PUT',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/tariffs/{courseTariffId}/settings',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'courseTariffId' => 'int!'],
    ],
    'edu.courseTariffs.updatePaymentMethod' => [
        'method' => 'PUT',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/tariffs/{courseTariffId}/payment-method/{paymentId}',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'courseTariffId' => 'int!', 'paymentId' => 'int!'],
    ],
    'edu.courseTariffs.updateTariffAccessRestriction' => [
        'method' => 'PUT',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/tariffs/{courseTariffId}/access-restriction-settings',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'courseTariffId' => 'int!'],
    ],
    'edu.courseTariffs.updateTariffContentAccess' => [
        'method' => 'PUT',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/tariffs/accesses/contents/{courseTariffId}',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'courseTariffId' => 'int!'],
    ],
    'edu.courseTariffs.updateTariffFunctionalityAccess' => [
        'method' => 'PUT',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/tariffs/accesses/functionality/{courseTariffId}',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'courseTariffId' => 'int!'],
    ],
    'edu.courseTariffs.updateTariffRenewal' => [
        'method' => 'PUT',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/tariffs/{courseTariffId}/tariff-renewal/{id}',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'courseTariffId' => 'int!', 'id' => 'int!'],
    ],
    'edu.courseTariffs.updateTariffsEntityAccess' => [
        'method' => 'PUT',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/tariffs/accesses/entities',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!'],
    ],
    'edu.courseTariffs.upsertTariffAdvertisingText' => [
        'method' => 'PUT',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/tariffs/{courseTariffId}/advertising-text',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'courseTariffId' => 'int!'],
    ],
    'edu.courses.batchCopyCourseContent' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/courses/{courseId}/batch/copy',
        'params' => ['courseId' => 'int!'],
    ],
    'edu.courses.batchDeleteCourseContent' => [
        'method' => 'DELETE',
        'path'   => '/edu/public/v1/courses/{courseId}/batch/delete',
        'params' => ['courseId' => 'int!'],
    ],
    'edu.courses.batchUpdateCourseContentAccess' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/courses/{courseId}/batch/access',
        'params' => ['courseId' => 'int!'],
    ],
    'edu.courses.createCourse' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/courses',
        'params' => [],
    ],
    'edu.courses.deleteCourse' => [
        'method' => 'DELETE',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!'],
    ],
    'edu.courses.duplicateCourse' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/duplicate',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!'],
    ],
    'edu.courses.listCourses' => [
        'method' => 'GET',
        'path'   => '/edu/public/v1/courses',
        'params' => [],
    ],
    'edu.courses.updateCourse' => [
        'method' => 'PUT',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!'],
    ],
    'edu.domains.checkSubdomainName' => [
        'method' => 'GET',
        'path'   => '/edu/public/v1/domains/{name}/{systemDomainId}/check',
        'params' => ['name' => 'string!', 'systemDomainId' => 'int!'],
    ],
    'edu.domains.listDomains' => [
        'method' => 'GET',
        'path'   => '/edu/public/v1/domains',
        'params' => [],
    ],
    'edu.domains.listSystemDomains' => [
        'method' => 'GET',
        'path'   => '/edu/public/v1/domains/available',
        'params' => [],
    ],
    'edu.forms.createForm' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/{schoolId}/{courseId}/form',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!'],
    ],
    'edu.forms.deleteForm' => [
        'method' => 'DELETE',
        'path'   => '/edu/public/v1/{schoolId}/{courseId}/form/{formId}',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'formId' => 'int!'],
    ],
    'edu.forms.saveFormQuestions' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/{schoolId}/{courseId}/form/{formId}/questions',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'formId' => 'int!'],
    ],
    'edu.forms.updateForm' => [
        'method' => 'PUT',
        'path'   => '/edu/public/v1/{schoolId}/{courseId}/form/{formId}',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'formId' => 'int!'],
    ],
    'edu.homeworkTasks.createHomework' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/homework/{schoolId}',
        'params' => ['schoolId' => 'int!'],
    ],
    'edu.homeworkTasks.deleteHomework' => [
        'method' => 'DELETE',
        'path'   => '/edu/public/v1/homework/{schoolId}/{courseId}/{homeworkId}',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'homeworkId' => 'int!'],
    ],
    'edu.homeworkTasks.updateHomework' => [
        'method' => 'PUT',
        'path'   => '/edu/public/v1/homework/{schoolId}/{homeworkId}',
        'params' => ['schoolId' => 'int!', 'homeworkId' => 'int!'],
    ],
    'edu.homeworks.getStudentHomework' => [
        'method' => 'GET',
        'path'   => '/edu/public/v1/homeworks/{studentHomeworkId}',
        'params' => ['studentHomeworkId' => 'int!'],
    ],
    'edu.homeworks.listHomeworksForChecking' => [
        'method' => 'GET',
        'path'   => '/edu/public/v1/homeworks/list/checking',
        'params' => ['limit' => 'int!', 'offset' => 'int!', 'status' => 'string', 'courseId' => 'int', 'schoolId' => 'int'],
    ],
    'edu.homeworks.rateStudentHomework' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/homeworks/{studentHomeworkId}/rate',
        'params' => ['studentHomeworkId' => 'int!'],
    ],
    'edu.lessons.createLesson' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/lesson',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!'],
    ],
    'edu.lessons.deleteLesson' => [
        'method' => 'DELETE',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/lesson/{lessonId}',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'lessonId' => 'int!'],
    ],
    'edu.lessons.listCourseLessonsContent' => [
        'method' => 'GET',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/lessons/content',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!'],
    ],
    'edu.lessons.listCourseSectionsWithLessons' => [
        'method' => 'GET',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/lessons',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'dateFrom' => 'string', 'dateTo' => 'string', 'rating' => 'int', 'access' => 'string', 'module' => 'string'],
    ],
    'edu.lessons.updateLesson' => [
        'method' => 'PUT',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/lesson/{lessonId}',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'lessonId' => 'int!'],
    ],
    'edu.schools.createSchool' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/schools',
        'params' => [],
    ],
    'edu.schools.deleteSchool' => [
        'method' => 'DELETE',
        'path'   => '/edu/public/v1/schools/{schoolId}',
        'params' => ['schoolId' => 'int!'],
    ],
    'edu.schools.listSchools' => [
        'method' => 'GET',
        'path'   => '/edu/public/v1/schools',
        'params' => [],
    ],
    'edu.schools.reorderSchools' => [
        'method' => 'PUT',
        'path'   => '/edu/public/v1/schools/order',
        'params' => [],
    ],
    'edu.schools.updateSchool' => [
        'method' => 'PUT',
        'path'   => '/edu/public/v1/schools/{schoolId}',
        'params' => ['schoolId' => 'int!'],
    ],
    'edu.sections.createSection' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/section',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!'],
    ],
    'edu.sections.deleteSection' => [
        'method' => 'DELETE',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/section/{sectionId}',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'sectionId' => 'int!'],
    ],
    'edu.sections.listSections' => [
        'method' => 'GET',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/section',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!'],
    ],
    'edu.sections.updateSection' => [
        'method' => 'PUT',
        'path'   => '/edu/public/v1/courses/{schoolId}/{courseId}/section/{sectionId}',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'sectionId' => 'int!'],
    ],
    'edu.students.changeStudentCourseProgress' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/students/{courseId}/change-progress',
        'params' => ['courseId' => 'int!'],
    ],
    'edu.students.changeStudentCourseStatus' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/students/{courseId}/change-status',
        'params' => ['courseId' => 'int!'],
    ],
    'edu.students.createStudent' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/students',
        'params' => [],
    ],
    'edu.students.deleteStudent' => [
        'method' => 'DELETE',
        'path'   => '/edu/public/v1/students/{studentId}',
        'params' => ['studentId' => 'int!'],
    ],
    'edu.students.getStudentCourseStatistics' => [
        'method' => 'GET',
        'path'   => '/edu/public/v1/students/course-statistics/{studentId}',
        'params' => ['studentId' => 'int!'],
    ],
    'edu.students.markStudentsAsPaid' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/students/{courseId}/mark-as-paid',
        'params' => ['courseId' => 'int!'],
    ],
    'edu.students.removeStudentFromCourse' => [
        'method' => 'DELETE',
        'path'   => '/edu/public/v1/students/{studentId}/{courseId}',
        'params' => ['studentId' => 'int!', 'courseId' => 'int!'],
    ],
    'edu.students.searchAuditory' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/students/auditory',
        'params' => [],
    ],
    'edu.students.searchCourseStudents' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/students/by-course/{courseId}',
        'params' => ['courseId' => 'int!'],
    ],
    'edu.students.updateStudentsAvailabilityDate' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/students/{courseId}/update-availability-date',
        'params' => ['courseId' => 'int!'],
    ],
    'edu.studentsGroups.listCourseGroups' => [
        'method' => 'GET',
        'path'   => '/edu/public/v1/groups/{courseId}',
        'params' => ['courseId' => 'int!'],
    ],
    'edu.tags.listTags' => [
        'method' => 'GET',
        'path'   => '/edu/public/v1/tags',
        'params' => [],
    ],
    'edu.tests.createTest' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/{schoolId}/{courseId}/tests',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!'],
    ],
    'edu.tests.deleteTest' => [
        'method' => 'DELETE',
        'path'   => '/edu/public/v1/{schoolId}/{courseId}/tests/{testId}',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'testId' => 'int!'],
    ],
    'edu.tests.saveTestQuestions' => [
        'method' => 'POST',
        'path'   => '/edu/public/v1/{schoolId}/{courseId}/tests/{testId}/questions',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'testId' => 'int!'],
    ],
    'edu.tests.updateTest' => [
        'method' => 'PUT',
        'path'   => '/edu/public/v1/{schoolId}/{courseId}/tests/{testId}',
        'params' => ['schoolId' => 'int!', 'courseId' => 'int!', 'testId' => 'int!'],
    ],
];

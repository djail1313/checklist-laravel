<?php

namespace Tests\Feature\V1;

use App\Models\Template;
use App\Models\TemplateChecklist;
use App\Models\TemplateItem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\TestCase;

class TemplateTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    const BASE_URL = 'api/v1/checklists';

    protected function setUp(): void
    {
        parent::setUp();
        $this->actingAs(new User([
            'id' => 2,
            'name' => 'Test User',
            'email' => 'test@user.com',
        ]), 'api');
    }

    public function testGetListAllChecklistsTemplates()
    {

        $test_data = include 'Data/Templates/list_all_checklists_template.php';

        $template = Template::create(Arr::only($test_data['data'][0], 'name'));
        $template->checklist()->create($test_data['data'][0]['checklist']);
        $template->items()->createMany($test_data['data'][0]['items']);

        $test_data['links'] = [
            'first' => route('templates.lists') . '?' . Arr::query([
                'page' => [
                    'offset' => 0,
                    'limit' => 10
                ]
            ]),
            'last' => route('templates.lists') . '?' . Arr::query([
                    'page' => [
                        'offset' => 0,
                        'limit' => 10
                    ]
                ]),
            'next' => null,
            'prev' => null,
        ];

        $response = $this->json('GET', self::BASE_URL . '/templates', ['Accept' => 'application/json']);

        $response->assertStatus(200);
        $response->assertJson($test_data);
    }

    public function testCreateChecklistTemplate()
    {
        /** @var Template $template */
        $template = Template::factory()->make();
        $template->setRelation('checklist', TemplateChecklist::factory()->make());
        $template->setRelation('items', TemplateItem::factory()->count(3)->make());

        $response = $this->json('POST',
            self::BASE_URL . '/templates',
            [
                'data' => [
                    'attributes' => $template->toArray()
                ]
            ],
            ['Accept' => 'application/json']);

        $response->assertStatus(201);
        $response->assertJson([
            'data' => [
                'attributes' => $template->toArray()
            ]
        ]);
    }

    public function testGetChecklistTemplate()
    {
        $template = $this->createTemplate();

        $template->checklist;
        $template->items;

        $response = $this->json('GET',
            self::BASE_URL . '/templates/' . $template->id,
            ['Accept' => 'application/json']);

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'id' => (string) $template->id,
                'type' => 'templates',
                'attributes' => Arr::except($template->toArray(), 'id'),
            ]
        ]);

    }

    public function testGetChecklistTemplateNotFound()
    {
        $response = $this->json('GET',
            self::BASE_URL . '/templates/' . 1,
            ['Accept' => 'application/json']);

        $response->assertStatus(404);
        $response->assertJson([
            'status' => '404',
            'error' => 'Not Found'
        ]);
    }

    public function testUpdateChecklistTemplate()
    {
        $template = $this->createTemplate();

        $template->name = 'Change name';

        $response = $this->json('PATCH',
            self::BASE_URL . '/templates/' . $template->id,
            [
                'data' => $template->toArray()
            ],
            ['Accept' => 'application/json']);

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'id' => (string) $template->id,
                'attributes' => Arr::except($template->toArray(), 'id')
            ]
        ]);
    }

    public function testDeleteCheclistTemplate()
    {
        $template = $this->createTemplate();

        $response = $this->json('DELETE',
            self::BASE_URL . '/templates/' . $template->id,
            ['Accept' => 'application/json']);

        $response->assertStatus(204);

        $this->assertNull(Template::find($template->id));
    }

//    public function testAssignBulkChecklistTemplate()
//    {
//        $template = $this->createTemplate();
//
//        $test_request_data = include 'Data/Templates/bulk_assign_checklist_template_request.php';
//        $test_response_data = include 'Data/Templates/bulk_assign_checklist_template_response.php';
//
//        $response = $this->json('POST',
//            self::BASE_URL . '/templates/' . $template->id . '/assigns',
//            [
//                'data' => $test_request_data
//            ],
//            ['Accept' => 'application/json']);
//
//        $response->assertStatus(201);
//        $response->assertJson($test_response_data);
//
//    }

    protected function createTemplate()
    {
        $template = Template::factory()->has(
            TemplateChecklist::factory()->count(1),
            'checklist'
        )->has(
            TemplateItem::factory()->count(2),
            'items'
        )->create();

        $template->checklist;
        $template->items;

        return $template;
    }

}

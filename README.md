# Admin API Example Plugin

This plugin demonstrates how to create an Admin API endpoint.

## Install

Copy the files in `src/custom/plugins`.
Refresh the plugin list with `bin/console plugin:refresh` on the server.
Install the plugin in the Administration dashboard `Extensions > My Extenstions`.
Activate the plugin.

## How to use the API endpoint
See also: https://shopware.stoplight.io/docs/admin-api/adminapi.json/paths/~1oauth~1token/post.


First you need an access token and your admin credentials.

```bash
curl --request POST \
  --url http://localhost/api/oauth/token \
  --header 'Content-Type: application/json' \
  --data '{"client_id":"administration","grant_type":"password","scopes":"write","username":"admin","password":"shopware"}'
```

The response looks like this:

```json
{
  "token_type": "Bearer",
  "expires_in": 600,
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiJhZG1pbmlzdHJhdGlvbiIsImp0aSI6ImZkZWUwMmQxOTk3NjllOGQwY2VhNjY0MWZmMWQ0N2I5ZWJiOTFhYzg4NjEyNzkxZDM3Y2YxMDc0ODVjYzY0MTUzZjQ1YjdkYmYxYTY1MjkxIiwiaWF0IjoiMTYyNzk3NTkxOS41NDEwNjMiLCJuYmYiOiIxNjI3OTc1OTE5LjU0MTA4NSIsImV4cCI6IjE2Mjc5NzY1MTkuNTI4MDE4Iiwic3ViIjoiMmQ2YWIxNTc3MzlkNDA5NGI0YjMyYTllMTUxMjdkZjYiLCJzY29wZXMiOlsid3JpdGUiLCJhZG1pbiJdfQ.d4f27oQc8rXMeGk8NnmFmOuiV3el9vUmvd5t5LoWDbihzmkEzN0bqB-iNlGh5mWNGOX-5HDu-1yMvVSqHAiLjBsVlDpIuh1mfMDA3vORsLHdQI43n2bA4k6NvnYusX7ogwVJOusKRiOFbCiAbbEhekUXsC_WKPjP-SjTKzH1cB9SOkMeDtemgyZ0vGG071aAzum1MPEFD3ZgP9wESlX15XL7xm-QxBkKh0cWA1BAC878ysSR45QH-tCKraNZRWbRaEQ5tlTmEV98GHbx1DqTsTtzpAF_dIGoNK9n1h6AHqOlhje_38em1FfcY71LWOrpbUkkxqV71Q-eklmifrovsA",
  "refresh_token": "def50200f0316e82b7d62e49b3fccbb0d78f5b470ad851b834daf31b37a4567f6d2a6ced4249994b8c041939ab1f3a6c8da2e2d33a796e2b72aa59640c5251289308c98180753bd1b0ace4d4ff67a7dd6f97e02daddd088853aa6e6445260d57025f029852300bd57b4c4c86067a67d5155ac8203fe5a004e6cc89267a0262969edb5e8489e195f499c232f89cb3435f3c23a25c72d0258364d19826234624c7e59662baa3e60d9a74a2acd16fb96726c055508a2592ae0473bc96d319ed07a59fe43b395ad5013ce2d0d88a56a13b9b771b17b9405a78812a09606eacc17288533b62bdc7373ecc7b0eba5c21b6aae5c2a2c3d715c06f90e305027ad4d5b009eb3fd8dfa3a0eb1116a9e2b8408beae68dd56814a534432efae3908266e5e0882dc435168aae5252a2b6883339707112b88832a768132533c0bc5cf30baf5446ae251fbf256339742f082800aaa58dada39c1f94d7c7db4f07c9a7dfbb549181c2045631ae21dc815d4a571d4173a8ea95d5fdc24d745213e28272790ea92e2c4714db3a8541c0ee34b703171aa52d39a34bf0933c83fbecd15f3dfca5fc"
}
```

Retrieve the access_token to use the Admin API:


```bash
url --request GET \
  --url http://localhost/api/v1/example/my-api-action \
  --header 'Accept: application/json' \
  --header 'Content-Type: application/json' \
  --header 'sw-access-key: SWSCV0LHQ3Q0DJE0YK1NOG8XYW' \
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiJhZG1pbmlzdHJhdGlvbiIsImp0aSI6ImZkZWUwMmQxOTk3NjllOGQwY2VhNjY0MWZmMWQ0N2I5ZWJiOTFhYzg4NjEyNzkxZDM3Y2YxMDc0ODVjYzY0MTUzZjQ1YjdkYmYxYTY1MjkxIiwiaWF0IjoiMTYyNzk3NTkxOS41NDEwNjMiLCJuYmYiOiIxNjI3OTc1OTE5LjU0MTA4NSIsImV4cCI6IjE2Mjc5NzY1MTkuNTI4MDE4Iiwic3ViIjoiMmQ2YWIxNTc3MzlkNDA5NGI0YjMyYTllMTUxMjdkZjYiLCJzY29wZXMiOlsid3JpdGUiLCJhZG1pbiJdfQ.d4f27oQc8rXMeGk8NnmFmOuiV3el9vUmvd5t5LoWDbihzmkEzN0bqB-iNlGh5mWNGOX-5HDu-1yMvVSqHAiLjBsVlDpIuh1mfMDA3vORsLHdQI43n2bA4k6NvnYusX7ogwVJOusKRiOFbCiAbbEhekUXsC_WKPjP-SjTKzH1cB9SOkMeDtemgyZ0vGG071aAzum1MPEFD3ZgP9wESlX15XL7xm-QxBkKh0cWA1BAC878ysSR45QH-tCKraNZRWbRaEQ5tlTmEV98GHbx1DqTsTtzpAF_dIGoNK9n1h6AHqOlhje_38em1FfcY71LWOrpbUkkxqV71Q-eklmifrovsA'
```

## Tips

Use `jq` to retrieve the access_token automatically:

```bash
TOKEN=$(curl -s --request POST \
  --url http://localhost/api/oauth/token \
  --header 'Content-Type: application/json' \
  --data '{"client_id":"administration","grant_type":"password","scopes":"write","username":"admin","password":"shopware"}' | jq '.access_token' | tr -d '"')
```

Then use this command to call the API

```bash
curl --request GET \
  --url http://localhost/api/v1/swag/my-api-action \
  --header 'Accept: application/json' \
  --header 'Content-Type: application/json' \
  --header 'sw-access-key: SWSCV0LHQ3Q0DJE0YK1NOG8XYW' \
--header "Authorization: Bearer $TOKEN"
```

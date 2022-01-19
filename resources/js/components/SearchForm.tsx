import React from 'react'
import Autocomplete from '@mui/material/Autocomplete'
import TextField from '@mui/material/TextField'
import ButtonForm from '../components/ButtonForm'
import Grid from '@mui/material/Grid'

interface Props {
  searchParams: Array<string>
}

const SearchForm: React.VFC<Props> = (props) => {
  return (
    <>
      <Grid container>
        <Autocomplete
          sx={{ p: '2px 4px', alignItems: 'center', width: '100%', mb: 2 }}
          multiple
          id="tags-outlined"
          options={props.searchParams}
          getOptionLabel={(option) => option}
          freeSolo
          renderInput={(params) => <TextField {...params} label="検索" />}
        />
        <ButtonForm text={'検索'} />
      </Grid>
    </>
  )
}

export default SearchForm
